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
                        <i class="bi bi-info-circle me-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Horizontal Form -->
                <form action="{{ route('create_deliverable_edit_post',$deliverable_table->id) }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deliverable</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="Deliverable"
                                placeholder="target" value="{{ $deliverable_table->deliverable }}" >
                        </div>
                    </div>
                    {{-- <input type="hidden" name="role" value="1"> --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
                <!-- End Horizontal Form -->

            </div>
        </div>

    </main>

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>
