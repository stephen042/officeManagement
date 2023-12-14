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
            <h1>Stake Holder Engagement Tracker</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Stake Holder Engagement Tracker</a></li>
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
                            <h5 class="card-title">Create a New Record</h5>

                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('stakeholderEngagementTracker-post') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Date of interaction</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="Date_of_interaction" value="{{ old('Date_of_interaction') }}" class="form-control" required>
                                        @error('Date_of_interaction')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">State</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ auth()->user()->state }}" name="state" class="form-control" readonly>
                                        @error('state')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Programme Year</label>
                                    <div class="col-sm-10 d-flex justify-content-between">
                                        <div class="w-50">
                                            <label for="inputText" class="d-block">from</label>
                                            <input type="month" value="{{ old('Programme_Year_From') }}" name="Programme_Year_From" class="form-control" required>
                                            @error('Programme_Year_From')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="w-50 mx-1">
                                            <label for="inputText" class="">To</label>
                                            <input type="month" value="{{ old('Programme_Year_To') }}" name="Programme_Year_To" class="form-control" required>
                                            @error('Programme_Year_To')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Quarter</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="quarter" aria-label="Default select example" required>
                                            <option selected disabled class="text-warning">Select Quarter </option>
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
                                    <label class="col-sm-2 col-form-label">Type of Stakeholders</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="Type_of_Stakeholders" aria-label="Default select example" required>
                                            <option selected disabled class="text-warning">Type of Stakeholders</option>
                                            <option value="Political leaders" {{ old("Type_of_Stakeholders") == " Political leaders" ? "selected":""  }}>Political leaders</option>
                                            <option value="Federal level" {{ old("Type_of_Stakeholders") == " Federal level " ? "selected":""  }}>Federal level</option>
                                            <option value="State level" {{ old("Type_of_Stakeholders") == " State level " ? "selected":""  }}>State level</option>
                                        </select>
                                        @error('Type_of_Stakeholders')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Designation of Stakeholders</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="Designation_of_Stakeholders" aria-label="Default select example" required>
                                            <option selected disabled class="text-warning">Designation of Stakeholders</option>
                                            <option value="Director" {{ old("Designation_of_Stakeholders") == " Director" ? "selected":""  }}>Director</option>
                                            <option value="Deputy Director" {{ old("Designation_of_Stakeholders") == " Deputy Director " ? "selected":""  }}>Deputy Director</option>
                                            <option value="Programme officer" {{ old("Designation_of_Stakeholders") == " Programme officer " ? "selected":""  }}>Programme officer</option>
                                            <option value="Desk Officer" {{ old("Designation_of_Stakeholders") == " Desk Officer" ? "selected":""  }}>Desk Officer</option>
                                        </select>
                                        @error('Designation_of_Stakeholders')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Output</label>
                                    <div class="col-sm-10">
                                        <select class="form-control choices-multiple" name="output[]"  multiple="multiple" required>
                                            <option selected disabled class="text-warning">Select Output</option>
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
                                    <label class="col-sm-2 col-form-label">PLANE Theme</label>
                                    <div class="col-sm-10">
                                        <select class="form-control choices-multiple" id="select" name="Plane_Theme" data-placeholder="choose output" required>
                                            <option selected disabled class="text-warning">Select PLANE Theme</option>
                                            <option value="Effective Teaching and improved Learning Outcomes" {{ old("Plane_Theme") == "Effective Teaching and improved Learning Outcomes"? "selected":""  }}>Effective Teaching and improved Learning Outcomes</option>
                                            <option value="GESI" {{ old("Plane_Theme") == "GESI"? "selected":""  }}>GESI</option>
                                            <option value="System stregthening" {{ old("Plane_Theme") == "System stregthening"? "selected":""  }}>System stregthening</option>
                                            <option value="PPP for Non-state actors" {{ old("Plane_Theme") == "PPP for Non-state actors"? "selected":""  }}>PPP for Non-state actors</option>
                                            <option value="Use of evidence" {{ old("Plane_Theme") == "Use of evidence"? "selected":""  }}>Use of evidence</option>
                                            <option value="Improved accounatbility" {{ old("Plane_Theme") == "Improved accounatbility"? "selected":""  }}>Improved accounatbility</option>
                                            <option value="Inclusive education policy" {{ old("Plane_Theme") == "Inclusive education policy"? "selected":""  }}>Inclusive education policy</option>
                                            <option value="Improved school management" {{ old("Plane_Theme") == "Improved school management"? "selected":""  }}>Improved school management</option>
                                            <option value="Financial Inclusion" {{ old("Plane_Theme") == "Financial Inclusion"? "selected":""  }}>Financial Inclusion</option>
                                            <option value="Innovation and Digital literacy" {{ old("Plane_Theme") == "Innovation and Digital literacy"? "selected":""  }}>Innovation and Digital literacy</option>
                                        </select>
                                        @error('Plane_Theme')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Resolution reached" class="col-sm-2 col-form-label">Resolution Reached</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" required name="Resolution_reached" style="height: 100px">{{ old('Resolution_reached') }}</textarea>
                                        @error('Resolution_reached')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Action taken on Resolution</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Action_taken_on_Resolution" id="gridRadios1" value="Yes" {{ old("Action_taken_on_Resolution") == "Yes"? "checked":""  }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Action_taken_on_Resolution" id="gridRadios2" value="No" {{ old("Action_taken_on_Resolution") == "No"? "checked":""  }} required>
                                            <label class="form-check-label" for="gridRadios2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Date Action Taken</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="Date_Action_Taken" value="{{ old('Date_Action_Taken') }}" class="form-control">
                                        @error('Date_Action_Taken')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="stateId" value="{{ auth()->user()->id }}" class="form-control">
                                <div class="text-center my-3">
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
                            <a href="{{ route('stakeHolderEngagementTracker_csv') }}" class="btn btn-primary my-2">Generate CSV all Records</a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date of interaction</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Programme Year</th>
                                        <th scope="col">Quarter</th>
                                        <th scope="col">Type of Stakeholders</th>
                                        <th scope="col">Designation of Stakeholders</th>
                                        <th scope="col"> Output</th>
                                        <th scope="col"> PLANE Theme</th>
                                        <th scope="col"> Resolution Reached</th>
                                        <th scope="col"> Action taken on Resolution</th>
                                        <th scope="col"> Date Action Taken</th>
                                        <th scope="col"> Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $tableDatas as $tableData => $data )
                                    <tr>
                                        <td scope="col">{{ $tableData +1 }}</td>
                                       
                                        <td scope="col">{{ date("Y/M/d", strtotime($data->Date_of_interaction )) }}</td>
                                        <td scope="col">{{ $data->state }}</td>
                                        <td scope="col">{{ date("Y M", strtotime($data->Programme_Year_From))}} - {{ date("Y M", strtotime($data->Programme_Year_To))}}</td>
                                        <td scope="col">{{ $data->quarter }}</td>
                                        <td scope="col">{{ $data->Type_of_Stakeholders }}</td>
                                        <td scope="col">{{ $data->Designation_of_Stakeholders }}</td>
                                        <td scope="col"> {{ $data->output }}</td>
                                        <td scope="col"> {{ $data->Plane_Theme }}</td>
                                        <td scope="col">{{ $data->Resolution_reached }}</td>
                                        <td scope="col"> {{ $data->Action_taken_on_Resolution }}</td>
                                        <td scope="col"> {{ $data->Date_Action_Taken }}</td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('edit-stakeholderEngagementTracker', $data->id) }}" class="btn btn-info btn-sm mx-2"><i class="bi bi-info-circle"></i>
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        no data
                                    </tr>
                                    @endforelse
                                    
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