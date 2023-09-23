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
            <button class="btn btn-primary" onclick="window.history.back()"> Back</button>
        </div>
        <div class="alert alert-info alert-dismissible fade show" role="alert">

        <h5><i class="text-danger bi bi-exclamation-triangle me-1"></i> NOTICE !!</h5>
        {{-- <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        <p>
            !! Please be
            <b class="text-danger"> Features not yet ready</b>
            
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
                            <h5 class="card-title">Update Records</h5>

                            <!-- General Form Elements -->
                            <form method="post" action="">
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
                                    <label class="col-sm-2 col-form-label">Quarter</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="quarter" aria-label="Default select example">
                                            <option selected disabled>Select Quarter</option>
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
                                    <label class="col-sm-2 col-form-label">Deliverable</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="deliverable"
                                            aria-label="Default select example">
                                            <option selected disabled>Select Deliverable</option>

                                        </select>
                                        @error('deliverable')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Achieved</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="acheived" class="form-control">
                                        @error('achieved')
                                            <p class="text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Create Record</label>
                                    <div class="col-sm-10">
                                        <button type="submit" disabled class="btn btn-primary">Submit</button>
                                    </div>
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
