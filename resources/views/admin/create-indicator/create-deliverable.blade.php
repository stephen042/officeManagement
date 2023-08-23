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
        <button onclick="window.location.href='{{ route('create_indicator') }}'"
            class="btn btn-primary my-2">back</button>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Deliverables </h5>
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
                <form action="" method="post">
                    @method('POST')
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deliverable</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" name="deliverable"
                                placeholder="deliverable" required>
                            @error('deliverable')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="state" value="{{ $outputinfo->state }}">
                    <input type="hidden" name="stateid" value="{{ $outputinfo->stateid }}">

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
                <h5 class="card-title">All Deliverables for {{ $outputinfo->output }} Output</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Deliverable</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deliverables as $infos => $data)
                            <tr>
                                <th scope="row">
                                    {{ $infos + 1 }}
                                </th>
                                <td>
                                    {{ ucwords($data->deliverable) }}
                                </td>
                                <td>
                                    {{ date('Y M/d H:i a', strtotime($data->created_at)) }}
                                </td>
                                <td class="">
                                    <div class="d-flex">
                                        <a href="{{ route('create_deliverable_edit', $data->id) }}"
                                            class="btn btn-info btn-sm mx-2 text-light"> Edit</a>
                                        <form action="{{ route('create_deliverable_delete', $data->id) }}"
                                            method="POST">
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
