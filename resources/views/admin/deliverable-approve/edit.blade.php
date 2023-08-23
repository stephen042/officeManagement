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

        {{-- <form action="" style="display: inline; float:right;">
      <button class="btn btn-danger my-2">delete</button>
    </form> --}}

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Approve Deliverables</h5>

                @if (session()->has('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="bi bi-info-circle me-1"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Horizontal Form -->
                <form action="{{ route('deliverable_approve_edit_post', $deliverableTbale->id) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="state"
                                placeholder="State Name" value="{{ $deliverableTbale->state }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Output</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail"
                                placeholder="State Name" value="{{ $outputinfo->output }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Indicator</label>
                        <div class="col-sm-10">
                            <textarea class="form-control"  placeholder="Indicator" style="max-height: 100px" disabled name="indicator">
                                {{ $outputinfo->indicator }}
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Target</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" 
                                placeholder="State Name" value="{{ $outputinfo->target }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" 
                                placeholder="State Name" value="{{ $deliverableTbale->Year }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Quarter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" 
                                placeholder="State Name" value="{{ $deliverableTbale->quarter }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deliverable</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" 
                                placeholder="State Name" value="{{ $deliverableTbale->Deliverable }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Deliverable</label> --}}
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="inputEmail" 
                                placeholder="State Name" value="2" name="status" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Achieved</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="acheived"
                                placeholder="State Name" value="{{ $deliverableTbale->acheived }}" >
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Approve</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->

            </div>
        </div>

    </main>

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>
