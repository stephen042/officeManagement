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
        <div class="alert alert-info alert-dismissible fade show" role="alert">

            <h5><i class="text-danger bi bi-exclamation-triangle me-1"></i> NOTICE !!</h5>
            {{-- <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            <p>
                !! Please be
                <b class="text-danger"> INFORMED THAT ANY RECORD SUBMITTED CAN'T BE DELETED OR EDITED .</b>
                Verify Before submitting
            <p class="text-primary"> Contact Admin for Changes</p>
            </p>
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
                            <form method="post" action="">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Year</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="year" class="form-control">
                                        @error('date')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Type of Event</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="quarter" aria-label="Default select example">
                                            <option selected disabled>Type </option>
                                            <option value="Workshop">Workshop</option>
                                            <option value="Training">Training</option>
                                        </select>
                                        @error('quarter')
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
                                        <input type="text" name="TOE" class="form-control">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Output</label>
                                    <div class="col-sm-10">
                                        <select class="form-control choices-multiple" 
                                            id="select" 
                                            name="multi_output"
                                            data-placeholder="choose output"
                                            multiple="multiple"
                                        >
                                            {{-- <option selected disabled>Select Output</option> --}}
                                            <option value="output1">output1</option>
                                            <option value="output2">output2</option>
                                            <option value="output3">output3</option>
                                        </select>
                                        @error('deliverable')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Location of training</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="multi_output"
                                            aria-label="Default select example">
                                            <option selected disabled>Select Output</option>
                                        </select>
                                        @error('deliverable')
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
                                        </select>
                                        @error('deliverable')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Venue of the Training</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="VOT"
                                            aria-label="Default select example">
                                            <option selected disabled>Select Venue of the Training</option>
                                        </select>
                                        @error('deliverable')
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
                                    <label for="inputText" class="col-sm-2 col-form-label">Expected No of Days</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="END" class="form-control">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Actual No of Days</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="AND" class="form-control">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="SD" class="form-control">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="ED" class="form-control">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <center>
                                    <label class="col-sm-2 col-form-label fs-5">Participants</label>
                                    </center>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Female</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="PF" onkeyup="popup()" name="PF" class="form-control  count">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Male</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="PM" onkeyup="popup()" name="PM" class="form-control  count">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                                <label for="inputText" class="col-sm-2 col-form-label fs-7 text-primary">PWD</label>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Male</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" id="PDW_PM" onkeyup="popup()" name="PDW_PM" class="form-control count">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Female</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" id="PDW_PF" onkeyup="popup()" name="PDW_PF" class="form-control count">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Total Participants</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="number" readonly id="total" value="" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Activity Code</label>
                                    <div class="col-sm-10 my-3">
                                        <input type="text" id="AC" name="PDW_PF" class="form-control">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Indicator Number</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="quarter" aria-label="Default select example">
                                            <option selected disabled>Select Indicator Number </option>
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
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Indicator</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" readonly style="height: 100px"></textarea>
                                    </div>
                                </div>

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

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('dashboard.includes.footer')
    <!-- End Footer -->

    @include('dashboard.includes.script')

    <script>
        function popup() {
            var value1 = Number(document.getElementById('PF').value);
            var value2 = Number(document.getElementById('PM').value);
            var value3 = Number(document.getElementById('PDW_PF').value);
            var value4 = Number(document.getElementById('PDW_PM').value);
            
            var total = value1 + value2 + value3 + value4;
            document.getElementById('total').value = total;
        } 
    </script>
    
</body>

</html>
