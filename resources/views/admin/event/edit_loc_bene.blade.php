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
        <button onclick="window.location.href='{{ route('admin_event') }}'" class="btn btn-primary my-2">back</button>


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Form</h5>

                @if (session()->has('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Horizontal Form -->
                <form action="{{ route('location_bene_post',$location_bene->id)}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Location of training</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="location_of_training" placeholder="State Name" value="{{ $location_bene->location_of_training }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Target Beneficiaries</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="target_bene" placeholder="Password" value="{{ $location_bene->target_bene }}">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <!-- End Horizontal Form -->

                    </div>
                </form>
                <hr>
                <form action="{{ route('location_bene_delete', $location_bene->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger my-2" type="submit" value="Delete">
                </form>
            </div>

    </main>

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>