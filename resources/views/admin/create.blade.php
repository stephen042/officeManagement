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
    <button onclick="window.location.href='{{ route('dashboard') }}'" class="btn btn-primary my-2">back</button>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Create Form</h5>
        @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <!-- Horizontal Form -->
        <form action="{{ route('create.post') }}" method="POST">
          @csrf
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
              <select class="form-select" name="type" aria-label="Default select example" required>
                <option value="">Select</option>
                <option value="website">Website</option>
                <option value="telegram">Telegram</option>
                <option value="email">Email</option>
                <option value="twitter">Twitter</option>
                <option value="discord">Discord</option>
                <option value="linkedin">Linkedin</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Value/Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail" name="value" placeholder="Name" required>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" name="create" class="btn btn-primary">Create</button>
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