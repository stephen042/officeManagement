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
            <h1>Stake Holder Engagement Tracker Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Stake Holder Engagement Tracker</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
            <button class="btn btn-primary" onclick="window.location.href='{{ route('stakeholderEngagementTracker')}}'"> Back</button>
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
                                    <label for="inputDate" class="col-sm-2 col-form-label">Date of interaction</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="Date_of_interaction" value="{{ $data->Date_of_interaction }}" class="form-control" >
                                        @error('Date_of_interaction')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Programme Year</label>
                                    <div class="col-sm-10 d-flex justify-content-between">
                                        <div class="w-50">
                                            <label for="inputText" class="d-block">from</label>
                                            <input type="month" value="{{ $data->Programme_Year_From }}" name="Programme_Year_From" class="form-control" >
                                            @error('Programme_Year_From')
                                            <p class="text-danger">{{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="w-50 mx-1">
                                            <label for="inputText" class="">To</label>
                                            <input type="month" value="{{ $data->Programme_Year_To }}" name="Programme_Year_To" class="form-control" >
                                            @error('Programme_Year_To')
                                            <p class="text-danger">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Quarter</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="quarter" aria-label="Default select example">
                                            <option selected disabled>Select Quarter</option>
                                            <option value="1" @if ($data->quarter == "1"){{ "selected" }}
                                                @endif >1</option>
                                            <option value="2" @if ($data->quarter == "2"){{ "selected" }}
                                                @endif>2</option>
                                            <option value="3" @if ($data->quarter == "3"){{ "selected" }}
                                                @endif>3</option>
                                            <option value="4" @if ($data->quarter == "4"){{ "selected" }}
                                                @endif>4</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Type of Stakeholders</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="Type_of_Stakeholders" aria-label="Default select example" >
                                            <option selected disabled class="text-warning">Type of Stakeholders</option>
                                            <option value="Political leaders" @if ($data->Type_of_Stakeholders == "Political leaders"){{ "selected" }}
                                                @endif >Political leaders</option>
                                            <option value="Federal level" @if ($data->Type_of_Stakeholders == "Federal level"){{ "selected" }}
                                                @endif >Federal level</option>
                                            <option value="State level" @if ($data->Type_of_Stakeholders == "State level"){{ "selected" }}
                                                @endif >State level</option>
                                        </select>
                                        @error('Type_of_Stakeholders')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Designation of Stakeholders</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="Designation_of_Stakeholders" aria-label="Default select example" >
                                            <option selected disabled class="text-warning">Designation of Stakeholders</option>
                                            <option value="Director" @if ($data->Designation_of_Stakeholders == "Director"){{ "selected" }}
                                                @endif>Director</option>
                                            <option value="Deputy Director" @if ($data->Designation_of_Stakeholders == "Deputy Director"){{ "selected" }}
                                                @endif>Deputy Director</option>
                                            <option value="Programme officer" @if ($data->Designation_of_Stakeholders == "Programme officer"){{ "selected" }}
                                                @endif>Programme officer</option>
                                            <option value="Desk Officer" @if ($data->Designation_of_Stakeholders == "Desk Officer"){{ "selected" }}
                                                @endif >Desk Officer</option>
                                        </select>
                                        @error('Designation_of_Stakeholders')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Output</label>
                                    <div class="col-sm-10">
                                        <span class="text-danger"><small>select new value or select the default value below</small></span>
                                        <input type="text" disabled class="form-control" value="{{ $data->output}}">
                                        <select class="form-control choices-multiple" id="select" name="output[]" multiple="multiple" >
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
                                    <label class="col-sm-2 col-form-label">PLANE Theme</label>
                                    <div class="col-sm-10">
                                        <select class="form-control choices-multiple" id="select" name="Plane_Theme" data-placeholder="choose output" >
                                            <option selected disabled class="text-warning">Select PLANE Theme</option>
                                            <option value="Effective Teaching and improved Learning Outcomes" @if ($data->Plane_Theme == "Effective Teaching and improved Learning Outcomes"){{ "selected" }}
                                                @endif >Effective Teaching and improved Learning Outcomes</option>
                                            <option value="GESI" @if ($data->Plane_Theme == "GESI"){{ "selected" }}
                                                @endif >GESI</option>
                                            <option value="System stregthening" @if ($data->Plane_Theme == "System stregthening"){{ "selected" }}
                                                @endif >System stregthening</option>
                                            <option value="PPP for Non-state actors" @if ($data->Plane_Theme == "PPP for Non-state actors"){{ "selected" }}
                                                @endif >PPP for Non-state actors</option>
                                            <option value="Use of evidence" @if ($data->Plane_Theme == "Use of evidence"){{ "selected" }}
                                                @endif >Use of evidence</option>
                                            <option value="Improved accounatbility" @if ($data->Plane_Theme == "Improved accounatbility"){{ "selected" }}
                                                @endif >Improved accounatbility</option>
                                            <option value="Inclusive education policy" @if ($data->Plane_Theme == "Inclusive education policy"){{ "selected" }}
                                                @endif >Inclusive education policy</option>
                                            <option value="Improved school management" @if ($data->Plane_Theme == "Improved school management"){{ "selected" }}
                                                @endif >Improved school management</option>
                                            <option value="Financial Inclusion" @if ($data->Plane_Theme == "Financial Inclusion"){{ "selected" }}
                                                @endif >Financial Inclusion</option>
                                            <option value="Innovation and Digital literacy" @if ($data->Plane_Theme == "Innovation and Digital literacy"){{ "selected" }}
                                                @endif >Innovation and Digital literacy</option>
                                        </select>
                                        @error('Plane_Theme')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Resolution reached" class="col-sm-2 col-form-label">Resolution Reached</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control"  name="Resolution_reached" style="height: 100px">{{ $data->Resolution_reached }}</textarea>
                                        @error('Resolution_reached')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Action taken on Resolution</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Action_taken_on_Resolution" id="gridRadios1" value="Yes" @if ($data->Action_taken_on_Resolution == "Yes"){{ "checked" }}
                                                @endif >
                                            <label class="form-check-label" for="gridRadios1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Action_taken_on_Resolution" id="gridRadios2" value="No" @if ($data->Action_taken_on_Resolution == "No"){{ "checked" }}
                                                @endif  >
                                            <label class="form-check-label" for="gridRadios2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Date Action Taken</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="Date_Action_Taken" value="{{ $data->Date_Action_Taken }}" class="form-control">
                                        @error('Date_Action_Taken')
                                        <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="stateId" value="{{ auth()->user()->id }}" class="form-control">
                                <div class="text-center my-3">
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