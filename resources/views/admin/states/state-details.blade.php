<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.includes.head')

</head>

<body>

    <!-- ======= Header ======= -->
    @include('admin.includes.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin.includes.sidebar');
    <!-- End Sidebar-->

    <main id="main" class="main">
        <button onclick="window.history.back()" class="btn btn-primary my-2">back</button>
        <hr>
        <div class="card">
            <div class="card-body" style="overflow:auto;">
                <h5 class="card-title">Deliverables Table </h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Deliverables</th>
                            <th scope="col">Created on </th>
                            <!-- <th scope="col">Updated on </th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($delivrableinfo as $info => $data)
                        <tr>
                            <th scope="row">{{ $info +1}}</th>
                            <td>{{ ucwords($data->deliverable) }}</td>
                            <td>{{ date("Y M/d H:i a",strtotime($data->created_at)) }}</td>
                        </tr>

                        @empty
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

        <hr>
        <div class="card">
            <div class="card-body" style="overflow:auto;">
                <h3 class="card-title">Achieved Data</h3>
                <!-- <h5 class="card-title">Total Achieved :  </h5> -->
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Year</th>
                            <th scope="col">Quarter</th>
                            <th scope="col">Deliverable</th>
                            <th scope="col">MoVs</th>
                            <th scope="col">Status</th>
                            <th scope="col">Achieved</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $achievedinfo as $info => $data )
                        <tr>
                            <th scope="row">{{ $info +1 }}</th>
                            <td>{{ $data->Year }}</td>
                            <td>{{ $data->quarter }}</td>
                            <td>{{ ucwords($data->Deliverable) }}</td>
                            <td style="overflow-x: scroll;width:30%;height:30px;">{{ ucwords($data->MoVs) }}</td>
                            <td>{{ ucwords(config('app.status')[$data->status]) }}</td>
                            <td>{{ $data->acheived}}</td>
                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Download Record Pdf</h5>

                <form method="post" action="{{ route('pdf') }}">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Quarter</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="quarterpdf" aria-label="Default select example" required>
                                <option selected disabled>Select Quarter</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            @error('quarterpdf')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="yearpdf" aria-label="Default select example" required>
                                <option selected disabled>Select Year</option>
                                
                                @forelse ($year as $list)
                                <option value="{{ $list->Year }}">{{ $list->Year }}</option>
                                @empty
                                <option selected disabled>No Data available </option>
                                @endforelse

                            </select>
                            @error('yearpdf')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="idpdf" value="{{ $outputTableinfo->id }}">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Download PDF</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Download</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row ">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Target : {{ $outputTableinfo->target }} - Achieved | {{ date('Y') }}</h5>
                        @php
                            $Remaining_target = (int) $outputTableinfo->target - (int) $sum_of_quarter 
                        @endphp
                        <!-- Doughnut Chart -->
                        <canvas id="doughnutChart" style="max-height: 300px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#doughnutChart'), {
                                    type: 'doughnut',
                                    data: {
                                        labels: [
                                            'Target Remaining',
                                            'Achieved',
                                        ],
                                        datasets: [{
                                            label: 'My First Dataset',
                                            data: [{{ $Remaining_target }},{{ $sum_of_quarter }}],
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    }
                                });
                            });
                        </script>
                        <!-- End Doughnut CHart -->

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card" style="background-color: lightgrey;">
            <div class="card-body">
                <h5 class="card-title">Get Chart </h5>
                <form method="post" action="{{ route('selectedChart',[$outputTableinfo->stateid,$outputTableinfo->id]) }}" >
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="yearChart" aria-label="Default select example" required>
                                <option selected disabled>Select Year</option>
                                
                                @forelse ($year as $list)
                                <option value="{{ $list->Year }}">{{ $list->Year }}</option>
                                @empty
                                <option selected disabled>No Data available </option>
                                @endforelse

                            </select>
                            @error('yearpdf')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>

                    <!-- <input type="hidden" name="idpdf" value="{{ $outputTableinfo->id }}"> -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Get Chart</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Get Chart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Shows Base on Selection - Target : {{ $outputTableinfo->target }}</h5>
                            @if (session()->has('year'))
                            <span class="card-title">
                                Chart for : {{ session('year') }}
                            </span>
                            @endif
                        
                            @php
                                $target_remaining  =  (int) session('target_remaining') ? (int) session('target_remaining') :  $outputTableinfo->target  ;
                                $sum_of_data  = (int) session('sum_of_data');
                                
                            @endphp
                        <!-- Doughnut Chart -->
                        <canvas id="doughnutChart4" style="max-height: 300px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#doughnutChart4'), {
                                    type: 'doughnut',
                                    data: {
                                        labels: [
                                            'Target Remaining',
                                            'Achieved',
                                        ],
                                        datasets: [{
                                            label: 'My First Dataset',
                                            data: [ {{$target_remaining }},{{$sum_of_data }} ],
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    }
                                });
                            });
                        </script>
                        <!-- End Doughnut CHart -->

                    </div>
                </div>
            </div>
        </div>


    </main>

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>