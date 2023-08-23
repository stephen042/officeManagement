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
                <h5 class="card-title">Create Output & Indicator</h5>
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
                <form action="{{ route('create_indicator_post') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Select State</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" required name="state">
                                <option selected disabled>Select State</option>
                                @foreach ($state as $data)
                                    <option value="{{ $data->state }}">{{ $data->state }}</option>
                                @endforeach

                            </select>
                            @error('state')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Output</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="output"
                                placeholder="Output" required>
                            @error('output')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Indicator</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Indicator" style="max-height: 100px" name="indicator"></textarea>
                            @error('indicator')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Target</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="target"
                                placeholder="target" required>
                            @error('target')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-danger">Confirm State</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" required name="stateid">
                                <option selected disabled>confirm State</option>
                                @foreach ($state as $data)
                                    <option value="{{ $data->id }}">{{ $data->state }}</option>
                                @endforeach

                            </select>
                            @error('state')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>

                    {{-- <input type="hidden" name="role" value="1"> --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
                <!-- End Horizontal Form -->

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
                            <th scope="col">State</th>
                            <th scope="col">Output</th>
                            <th scope="col">Indicator</th>
                            <th scope="col">Target</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($outputTable as $infos => $data)
                            <tr>
                                <th scope="row">{{ $infos + 1 }}</th>
                                <td>{{ ucwords($data->state) }}</td>
                                <td>{{ $data->output }}</td>
                                <td>{{ $data->indicator }}</td>
                                <td>{{ $data->target }}</td>
                                <td class="">
                                    <div class="d-flex">
                                        <a href="{{ route('create_indicator_edit', $data->id) }}"
                                            class="btn btn-info btn-sm mx-2 text-light"> Edit</a>
                                        <form action="{{ route('create_indicator_delete', $data->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input class="btn btn-danger" type="submit" value="delete" />
                                        </form>
                                        <a href="{{ route('create_deliverable', $data->id) }}"
                                            class="btn btn-warning btn-sm mx-2 text-light">Deliverable</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row"></th>
                                <td></td>
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
