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
        <button onclick="window.location.href='{{ route('admin') }}'" class="btn btn-primary my-2">back</button>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create State</h5>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Horizontal Form -->
                <form action="{{ route('create_state_post') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">State Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="state"
                                placeholder="State Name" required>
                            @error('state')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="password"
                                placeholder="Password" required>
                            @error('password')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    {{-- <input type="hidden" name="role" value="1"> --}}
                    <div class="text-center">
                        <button type="submit" name="create" class="btn btn-primary">Create</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->

            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All States</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">state</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                            {{-- <th scope="col">Cr</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($stateinfo as $info => $data)
                        <tr>
                            <th scope="row">{{ $info +1 }}</th>
                            <td>{{ ucwords($data->state) }}</td>
                            <td>{{ $data->password }}</td>
                            <td class="">
                                <div class="d-flex">
                                  <a href="{{ route('create_state_edit',$data->id) }}" class="btn btn-info btn-sm mx-2"> Edit</a>
                                  <form action="{{ route('create_state_delete',$data->id) }}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <input class="btn btn-danger" type="submit" value="delete" />
                                  </form>
                              </div>
                            </td>
                        </tr>
                      @empty
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                    </tr>
                      @endforelse
                        
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

    </main>

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>
