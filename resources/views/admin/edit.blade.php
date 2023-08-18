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

    {{-- <form action="" style="display: inline; float:right;">
      <button class="btn btn-danger my-2">delete</button>
    </form> --}}

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Edit Form</h5>

        @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <i class="bi bi-info-circle me-1"></i>
            {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Horizontal Form -->
        <form action="{{ route('edit.post',[$infos->id]) }}" method="POST">
          @csrf
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">

              <select class="form-select" aria-label="Default select example" required name="type">
                <option value="">Select</option>
                <option value="website" @if ($infos->type == 'website'){ {{ 'selected' }} } @endif >Website</option>
                <option value="telegram" @if ($infos->type == 'telegram'){ {{ 'selected' }} } @endif>Telegram</option>
                <option value="email" @if ($infos->type == 'email'){ {{ 'selected' }} } @endif>Email</option>
                <option value="twitter" @if ($infos->type == 'twitter'){ {{ 'selected' }} } @endif>Twitter</option>
                <option value="discord" @if ($infos->type == 'discord'){ {{ 'selected' }} } @endif>Discord</option>
                <option value="linkedin" @if ($infos->type == 'linkedin'){ {{ 'selected' }} } @endif>Linkedin</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Value/Name</label>
            <div class="col-sm-10">
              <input type="text" value="{{ $infos->value }}" name="value" class="form-control" id="inputEmail" placeholder="Name">
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
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