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
            <h1>Event Section</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Event</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
            <button class="btn btn-primary" onclick="window.location.href='/dashboard'"> Back</button>
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
                                        <input type="date" name="year" value="{{ old('year') }}" class="form-control">
                                        @error('year')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Type of Event</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="type_of_event" aria-label="Default select example">
                                            <option selected disabled>type</option>
                                            <option value="Workshop" {{ old("type_of_event") == "Workshop"? "selected":""  }}>
                                                Workshop
                                            </option>
                                            <option value="Training" {{ old("type_of_event") == "Training"? "selected":"" }}>
                                                Training
                                            </option>
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
                                        <input type="text" value="{{ old('title_of_event') }}" name="title_of_event" class="form-control">
                                        @error('title_of_event')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Output</label>
                                    <div class="col-sm-10">
                                        <select class="form-control choices-multiple" id="select" name="output[]" data-placeholder="choose output" multiple="multiple">
                                            <option selected disabled>Select Output</option>
                                            <option value="output1" {{ old("output[]") == "output1"? "selected":""  }}>output1</option>
                                            <option value="output2" {{ old("output[]") == "output2"? "selected":""  }}>output2</option>
                                            <option value="output3" {{ old("output[]") == "output3"? "selected":""  }}>output3</option>
                                            <option value="output4" {{ old("output[]") == "output4"? "selected":""  }}>output4</option>
                                        </select>
                                        @error('output[]')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Location of training</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="location_of_training" aria-label="Default select example">
                                            <option selected disabled>Select location</option>
                                            @foreach ($location as $data )
                                            <option value="{{ $data->location_of_training }}" {{ old("location_of_training") == $data->location_of_training ? "selected":""  }}>
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
                                        <select class="form-select" name="target_bene[]" aria-label="Default select example" multiple>
                                            <option selected disabled>Select Target Beneficiaries</option>
                                            @foreach ($bene as $data )
                                            <option value="{{ $data->target_bene }}" {{ old("target_bene") == $data->target_bene ? "selected":""  }}>
                                                {{$data->target_bene}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('target_bene')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Venue of the Training</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="venue_of_training" value="{{ old('venue_of_training') }}" class="form-control">
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
                                            <option value="1" {{ old("quarter") == "1" ? "selected":""  }}>1</option>
                                            <option value="2" {{ old("quarter") == "2" ? "selected":""  }}>2</option>
                                            <option value="3" {{ old("quarter") == "3" ? "selected":""  }}>3</option>
                                            <option value="4" {{ old("quarter") == "4" ? "selected":""  }}>4</option>
                                        </select>
                                        @error('quarter')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label ">Expected Number of Days</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('expected_no_days') }}" name="expected_no_days" id="EnD" class="form-control">
                                        @error('expected_no_days')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label ">Actual Number of Days</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('actual_no_days') }}" name="actual_no_days" id="AnD" class="form-control">
                                        @error('actual_no_days')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" value="{{ old('start_date') }}" name="start_date" class="form-control">
                                        @error('start_date')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" value="{{ old('end_date') }}" name="end_date" class="form-control">
                                        @error('end_date')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                                <div class="row mb-3">

                                    <label class="col-sm-2 col-form-label fs-5" style="font-weight: bold">Participants
                            </label>
                            <label class="alert alert-info"> The List of Participants does not encompass PLANE staff</label>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Female</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('p_female') }}" id="PF" onkeyup="popup()" name="p_female" class="form-control  count ">
                                        @error('p_female')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Male</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('p_male') }}" id="PM" onkeyup="popup()" name="p_male" class="form-control  count ">
                                        @error('p_male')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                                <label for="inputText" class="col-sm-2 col-form-label fs-7 text-primary" style="font-weight: bold">PWD</label>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">PWD total</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" value="{{ old('pwd') }}" id="PDW_PM" name="pwd" class="form-control count ">
                                        @error('pwd')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Total Participants</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" value="{{ old('p_total') }}" readonly id="total" name="p_total" value="" class="form-control">
                                        @error('p_total')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Activity Code</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="text" id="AC" value="{{ old('activity_code') }}" name="activity_code" class="form-control">
                                        @error('activity_code')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Means of verification ( MoVs)</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" required name="MoVs[]" aria-label="Default select example" multiple>
                                            <option selected disabled>MoVs</option>
                                            <option value="Participant Feedback Surveys">Participant Feedback Surveys</option>
                                            <option value="Pictures">Pictures</option>
                                            <option value="Activity Report">Activity Report</option>
                                            <option value="Pre- and Post-Event/Training Assessments">Pre- and Post-Event/Training Assessments</option>
                                            <option value="Facilitator/Trainer Assessment">Facilitator/Trainer Assessment</option>
                                            <option value="Post-Training Application or Follow-up">Post-Training Application or Follow-up</option>
                                            <option value="Peer Review">Peer Review</option>
                                            <option value="Case Studies">Case Studies</option>
                                            <option value="Focus Group Discussion Reports">Focus Group Discussion Reports</option>
                                            <option value="social media and Online Analytics">social media and Online Analytics</option>
                                            <option value="Certification or Assessment Tests">Certification or Assessment Tests</option>
                                            <option value="Stakeholder Interviews">Stakeholder Interviews</option>
                                            <option value="Long-Term Impact Assessment">Long-Term Impact Assessment</option>
                                            <option value="Action Plan developed">Action Plan developed </option>
                                            <option value="Baseline Assessment Report">Baseline Assessment Report </option>
                                            <option value="Midline Assessment report">Midline Assessment report </option>
                                            <option value="Endline Assessment Report">Endline Assessment Report </option>
                                            <option value="Video Recording">Video Recording </option>
                                            <option value="Voice Note">Voice Note</option>
                                            <option value="Surveys and Questionnaires">Surveys and Questionnaires</option>
                                            <option value="Key Informant Interviews">Key Informant Interviews</option>
                                            <option value="Field Visits Report">Field Visits Report</option>
                                            <option value="Statistical Analysis">Statistical Analysis</option>
                                            <option value="Data Quality Assessments">Data Quality Assessments</option>
                                            <option value="Beneficiary Feedback">Beneficiary Feedback</option>
                                            <option value="Data Validation">Data Validation</option>
                                            <option value="Documentation Review">Documentation Review</option>
                                        </select>
                                        @error('MoVs')
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
                            <a href="{{ route('event_csv') }}" class="btn btn-primary my-2">Generate CSV all Records</a>
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
                                        <th scope="col"> PWD</th>
                                        <th scope="col"> Total</th>
                                        <th scope="col"> Activity Code</th>
                                        <th scope="col"> Indicator Number</th>
                                        <th scope="col"> MoVs</th>
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
                                            {{ $data->pwd }}
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
                                        <td>
                                            {{ $data->MoVs }}
                                        </td>
                                        <td>{{ $data->indicator }}</td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('edit_event',$data->id) }}" class="btn btn-info btn-sm mx-2"><i class="bi bi-info-circle"></i>
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