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
            <button class="btn btn-primary" onclick="history.go(-1)"> Back</button>
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
                            <h5 class="card-title">Create a Deliverable Record</h5>

                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('edit_indicator_post', [$outputinfo->id]) }}">
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
                                            @forelse ($deliverableinfo as $list)
                                                <option value="{{ $list->deliverable }}">{{ $list->deliverable }}
                                                </option>
                                            @empty
                                                <option value="No deliverable">No deliverable </option>
                                            @endforelse

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
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                            <!-- End General Form Elements -->

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Download Record</h5>

                            <form method="post" action="{{ route('pdf') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Quarter</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="quarterpdf"
                                            aria-label="Default select example" required>
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
                                        <select class="form-select" name="yearpdf" aria-label="Default select example"
                                            required>
                                            <option selected disabled>Select Year</option>
                                            @forelse ($editinfodistinct as $list)
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

                                <input type="hidden" name="idpdf" value="{{ $outputinfo->id }}">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Download PDF</label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Download</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body" style="overflow:auto;">
                            {{-- <h5 class="card-title">Datatables</h5> --}}
                            {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Quarter</th>
                                        <th scope="col">Deliverable</th>
                                        <th scope="col">Achieved</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Date/Time </th>
                                        {{-- <th scope="col">Total</th> --}}
                                        {{-- <th scope="col">Delete</th> --}}
                                        {{-- <th scope="col">Start Date</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($editinfo as $info => $data)
                                        <tr>
                                            <th scope="row">{{ $info + 1 }}</th>
                                            <td>
                                                {{ $data->Year }}
                                            </td>
                                            <td>
                                                {{ $data->quarter }}
                                            </td>
                                            <td>
                                                {{ $data->Deliverable }}
                                            </td>
                                            <td>
                                                {{ $data->acheived }}
                                            </td>

                                            <td>
                                                @if ($data->status == 1)
                                                    <button disabled class="btn btn-warning"> Pending..</button>
                                                @elseif ($data->status == 2)
                                                    <button disabled class="btn btn-info"> Approved</button>
                                                @endif
                                            </td>
                                            <td>
                                                {{ date('d M, Y / h:i a', strtotime($data->created_at)) }}
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>

                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="d-flex justify-content-around">
                                            </td>
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
