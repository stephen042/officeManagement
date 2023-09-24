<!DOCTYPE html>
<html lang="en">

<head>

    @include('dashboard.includes.head')

</head>

<body>

    <!-- ======= Header ======= -->
    @include('dashboard.includes.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('dashboard.includes.sidebar');
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Indicator Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Indicator</a></li>
                    {{-- <li class="breadcrumb-item">Tables</li> --}}
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
            <button class="btn btn-primary" onclick="window.location.href='{{ route('dashboard') }}'"> Back</button>
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
                        <div class="card-body">
                            <h5 class="card-title">Create an Event Record</h5>

                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('event-post') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Year</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="year" class="form-control">
                                        @error('year')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Type of Event</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="type_of_event" aria-label="Default select example">
                                            <option selected disabled>Type </option>
                                            <option value="Workshop">Workshop</option>
                                            <option value="Training">Training</option>
                                        </select>
                                        @error('type_of_event')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <hr>
                                <br>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title of training or Event</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title_of_event" class="form-control">
                                        @error('title_of_event')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Output</label>
                                    <div class="col-sm-10">
                                        <select class="form-control choices-multiple" 
                                            id="select" 
                                            name="output[]"
                                            data-placeholder="choose output"
                                            multiple="multiple"
                                        >
                                            <option selected disabled>Select Output</option>
                                            <option value="output1">output1</option>
                                            <option value="output2">output2</option>
                                            <option value="output3">output3</option>
                                            <option value="output4">output4</option>
                                        </select>
                                        @error('output')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Location of training</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="location_of_training"
                                            aria-label="Default select example">
                                                <option selected disabled>Select location</option>
                                            @foreach ($location_bene as $data )
                                                <option value="{{ $data->location_of_training }}">
                                                    {{ $data->location_of_training }}
                                                </option>
                                            @endforeach 
                                        </select>
                                        @error('location_of_training')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Target Beneficiaries</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="target_Bene"
                                            aria-label="Default select example">
                                                <option selected disabled>Select Target Beneficiaries</option>
                                            @foreach ($location_bene as $data )
                                                <option value="{{ $data->target_bene }}">
                                                    {{$data->target_bene}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('target_Bene')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Venue of the Training</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="venue_of_training" class="form-control">
                                        @error('venue_of_training')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Quarter</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="quarter" aria-label="Default select example">
                                            <option selected disabled>Select Quarter </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                        @error('quarter')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label ">Expected Number of Days</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="expected_no_days" id="EnD" class="form-control">
                                        @error('expected_no_days')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label ">Actual Number of Days</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="actual_no_days" id="AnD" class="form-control">
                                        @error('actual_no_days')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="start_date" class="form-control">
                                        @error('start_date')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="end_date" class="form-control">
                                        @error('end_date')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                                <div class="row mb-3">
                                   
                                    <label class="col-sm-2 col-form-label fs-5" style="font-weight: bold">Participants</label>
                                    
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Female</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="PF" onkeyup="popup()" name="p_female" class="form-control  count ">
                                        @error('p_female')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Male</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="PM" onkeyup="popup()" name="p_male" class="form-control  count ">
                                        @error('p_male')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                                <label for="inputText" class="col-sm-2 col-form-label fs-7 text-primary" style="font-weight: bold">PWD</label>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Male</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" id="PDW_PM" onkeyup="popup()" name="p_pwd_male" class="form-control count ">
                                        @error('p_pwd_male')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Female</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" id="PDW_PF" onkeyup="popup()" name="p_pwd_female" class="form-control count ">
                                        @error('p_pwd_female')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Total Participants</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" readonly id="total" name="p_total" value="" class="form-control">
                                        @error('p_total')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Activity Code</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="text" id="AC" name="activity_code" class="form-control">
                                        @error('activity_code')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                @livewire('output')

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>

                            </form>
                            <!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <hr>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
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
                                              {{ $data->indicator_no }}
                                            </td>
                                            <td>{{ $data->indicator }}</td>
                                            <td class="d-flex justify-content-around">
                                              <a href="{{ route('edit_event',$data->id) }}"
                                                class="btn btn-info btn-sm mx-2"><i class="bi bi-info-circle"></i>
                                                Edit
                                              </a>
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
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('dashboard.includes.footer')
    <!-- End Footer -->

    @include('dashboard.includes.script')

    
</body>

</html>
