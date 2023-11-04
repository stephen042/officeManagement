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
            <h1>Event Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Event</a></li>
                    {{-- <li class="breadcrumb-item">Tables</li> --}}
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
            <button class="btn btn-primary" onclick="window.location.href='{{route('event')}}'"> Back</button>
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
                            <h5 class="card-title">Update Records</h5>

                            <!-- General Form Elements -->
                            <form method="post" action="">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Year</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="year" value="{{$event_tb->year}}" class="form-control">
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Type of Event</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="type_of_event" aria-label="Default select example">
                                            <option value="Workshop" @if ($event_tb->type_of_event == "Workshop" ){{ "selected" }}

                                                @endif >Workshop</option>
                                            <option value="{{$event_tb->type_of_event}}" @if ($event_tb->type_of_event == "Training" ){{ "selected" }}

                                                @endif> Training</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title of training or Event</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title_of_event" value="{{ $event_tb->title_of_event}}" class="form-control">
                                    </div>

                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Output</label>
                                    <div class="col-sm-10">
                                        <span class="text-danger"><small>select new value or select the default value below</small></span>
                                        <input type="text" disabled class="form-control" value="{{ $event_tb->output}}">
                                        <select class="form-control choices-multiple" id="select" name="output[]" data-placeholder="choose output" multiple="multiple" required>
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
                                        <span class="text-danger"><small>select new value or select the default value below</small></span>
                                        <input type="text" disabled class="form-control" value="{{ $event_tb->location_of_training }}">

                                        <select class="form-select" name="location_of_training" aria-label="Default select example" required>

                                            <option selected disabled>Select location</option>
                                            @foreach ($location as $data )
                                            <option value="{{ $data->location_of_training }}">
                                                {{$data->location_of_training}}
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
                                        <span class="text-danger"><small>select new value or select the default value below</small></span>
                                        <input type="text" disabled class="form-control" value="{{ $event_tb->target_bene}}">

                                        <select class="form-select" name="target_bene" aria-label="Default select example" required multiple>
                                            <option selected disabled>Select Target Beneficiaries</option>
                                            @foreach ($bene as $data1 )
                                            <option value="{{ $data1->target_bene }}">
                                                {{ $data1->target_bene }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('target_Bene')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row mb-3
                                ">
                                    <label class="col-sm-2 col-form-label">Venue of the Training</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="venue_of_training" value="{{$event_tb->venue_of_training}}" class="form-control">
                                    </div>

                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Quarter</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="quarter" aria-label="Default select example">
                                            <option selected disabled>Select Quarter</option>
                                            <option value="1" @if ($event_tb->quarter == "1"){{ "selected" }}
                                                @endif >1</option>
                                            <option value="2" @if ($event_tb->quarter == "2"){{ "selected" }}
                                                @endif>2</option>
                                            <option value="3" @if ($event_tb->quarter == "3"){{ "selected" }}
                                                @endif>3</option>
                                            <option value="4" @if ($event_tb->quarter == "4"){{ "selected" }}
                                                @endif>4</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label ">Expected Number of Days</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="expected_no_days" value="{{$event_tb->expected_no_days}}" class="form-control">
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label ">Actual Number of Days</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="actual_no_days" value="{{$event_tb->actual_no_days}}" class="form-control">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="start_date" value="{{$event_tb->start_date}}" class="form-control">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="end_date" value="{{$event_tb->end_date}}" class="form-control">
                                    </div>

                                </div>
                                <hr>
                                <div class="row mb-3">

                                    <label class="col-sm-2 col-form-label fs-5" style="font-weight: bold">Participants</label>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Female</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{$event_tb->p_female}}" id="PF" onkeyup="popup()" name="p_female" class="form-control  count ">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Male</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{$event_tb->p_male}}" id="PM" onkeyup="popup()" name="p_male" class="form-control  count ">
                                    </div>

                                </div>
                                <hr>
                                <label for="inputText" class="col-sm-2 col-form-label fs-7 text-primary" style="font-weight: bold">PWD</label>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Male</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" id="PDW_PM" value="{{$event_tb->p_pwd_male}}" onkeyup="popup()" name="p_pwd_male" class="form-control count ">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Female</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" id="PDW_PF" value="{{$event_tb->p_pwd_female}}" onkeyup="popup()" name="p_pwd_female" class="form-control count ">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Total Participants</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" readonly id="total" name="p_total" value="{{$event_tb->p_total}}" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Activity Code</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="text" id="AC" value="{{$event_tb->activity_code}}" name="activity_code" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">initial indicator number</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="text" disabled value="{{$event_tb->indicator_no}}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">MoVs</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="indicator" value="{{$event_tb->MoVs}}" class="form-control">
                                    </div>
                                </div>

                                @livewire('output')

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>


                            </form>
                            <!-- End General Form Elements -->

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