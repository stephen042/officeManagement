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

        <div class="pagetitle">
            <h1>Event Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Event</a></li>
                    <li class="breadcrumb-it/em">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
            <button class="btn btn-primary" onclick="window.location.href='{{ route('admin') }}'"> Back</button>
        </div>

        <!-- End Page Title -->
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-5" style="overflow:auto;">

                            <form action="{{ route('admin_event') }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Location of Training</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{old('location_of_training')}}" class="form-control" id="inputEmail" name="location_of_training" placeholder="location of training">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Target Beneficiaries</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{old('target_bene')}}" class="form-control" id="inputEmail" name="target_bene" placeholder="target">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                            <!-- End Horizontal Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <div class="card">
            <div class="card-body" style="overflow:auto;">
                <h5 class="card-title">List Of Indicator</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Location of training</th>
                            <th scope="col">Target Beneficiaries</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($location_bene as $infos => $data)
                        <tr>
                            <th scope="row">{{ $infos + 1 }}</th>
                            <td>{{ ucwords($data->location_of_training) }}</td>
                            <td>{{ $data->target_bene }}</td>
                            <td class="">
                                <div class="d-flex">
                                    <a href="{{ route('location_bene', $data->id) }}" class="btn btn-info btn-sm mx-2 text-light"> Edit</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row"></th>
                            <td></td>
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
            <div class="card-body">
                <h5 class="card-title">Download Record Pdf</h5>

                <form method="post" action="{{ route('all_event_pdf',['filtered']) }}">
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
                                    <option value="{{ $list->year }}">{{ $list->year }}</option>
                                @empty
                                <option selected disabled>No Data available </option>
                                @endforelse

                            </select>
                            @error('yearpdf')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>

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
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="d-flex justify-content-between flex-wrap m-3">

                            <form action="{{ route('all_event_pdf',['all']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary my-2">Generate PDF all Records</button>
                            </form>
                            <a href="{{ route('event_csv') }}" class="btn btn-primary my-2">Generate CSV all Records</a>
                        </div>
                        <div class="card-body" style="overflow:auto;">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Type of Event</th>
                                        <th scope="col">Title of Event</th>
                                        <th scope="col">Output</th>
                                        <th scope="col">Location of training</th>
                                        <th scope="col">Target Beneficiaries</th>
                                        <th scope="col">Venue of the Training</th>
                                        <th scope="col"> Quarter</th>
                                        <th scope="col"> Expected No of Days</th>
                                        <th scope="col"> Actual No of Days</th>
                                        <th scope="col"> Start Date</th>
                                        <th scope="col"> End Date</th>
                                        <th scope="col"> Female</th>
                                        <th scope="col"> Male</th>
                                        <th scope="col"> PWD Male</th>
                                        <th scope="col"> PWD Female</th>
                                        <th scope="col"> Total</th>
                                        <th scope="col"> Activity Code</th>
                                        <th scope="col"> MoVs</th>
                                        <th scope="col"> Indicator Number</th>
                                        <th scope="col"> Indicator</th>
                                        <th scope="col"> Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventdata as $info => $data)
                                    <tr>
                                        <th scope="row">{{ $info +1 }}</th>
                                        <td>{{ date("Y",strtotime($data->year)) }}</td>
                                        <td>
                                            {{ $data->type_of_event }}
                                        </td>
                                        <td>
                                            {{ $data->title_of_event }}
                                        </td>
                                        <td>
                                            {{ $data->output }}
                                        </td>
                                        <td>
                                            {{ $data->location_of_training }}
                                        </td>
                                        <td>
                                            {{ $data->target_bene }}
                                        </td>
                                        <td>
                                            {{ $data->venue_of_training }}
                                        </td>
                                        <!-- <td>
                                              {{ $data->type_of_event }}
                                            </td> -->
                                        <td>
                                            {{ $data->quarter }}
                                        </td>
                                        <td>
                                            {{ $data->expected_no_days }}
                                        </td>
                                        <td>
                                            {{ $data->actual_no_days }}
                                        </td>
                                        <td>
                                            {{ $data->start_date }}
                                        </td>
                                        <td>
                                            {{ $data->end_date }}
                                        </td>
                                        <td>
                                            {{ $data->p_female }}
                                        </td>
                                        <td>
                                            {{ $data->p_male }}
                                        </td>
                                        <td>
                                            {{ $data->p_pwd_male }}
                                        </td>
                                        <td>
                                            {{ $data->p_pwd_female }}
                                        </td>
                                        <td>
                                            {{ $data->p_total }}
                                        </td>
                                        <td>
                                            {{ $data->activity_code }}
                                        </td>
                                        <td>
                                            {{ $data->MoVs }}
                                        </td>
                                        <td>
                                            {{ $data->indicator_no }}
                                        </td>
                                        <td>{{ $data->indicator }}</td>
                                        <td class="d-flex justify-content-around">
                                            <form action="{{route('admin_event_delete',$data->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger" type="submit" value="delete" />
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>