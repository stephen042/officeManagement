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
        <div class="card" style="overflow:auto;">
            <div class="card-body">
                <h5 class="card-title">All Deliverables for Approval</h5>
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
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">state</th>
                            <th scope="col">Year</th>
                            <th scope="col">Quarter</th>
                            <th scope="col">Deliverable</th>
                            <th scope="col">Achieved</th>
                            <th scope="col">status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deliverableapprove as $infos => $data)
                            <tr>
                                <th scope="row">
                                    {{ $infos + 1 }}
                                </th>
                                <td>
                                    {{ ucwords($data->state) }}
                                </td>
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
                                    <input type="button" 
                                        disabled 
                                        value="{{ config('app.status')[$data->status] }}"
                                        class="btn btn-warning btn-sm mx-2 text-light"
                                    >
                                </td>
                                <td>
                                     {{ date('Y M/d H:i a', strtotime($data->created_at)) }}
                                </td>
                                <td class="">
                                    <div class="d-flex">
                                        <a href="{{ route('deliverable_approve_edit', $data->id) }}" class="btn btn-info btn-sm mx-2 text-light"> View Details</a>
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
        <hr>
        <div class="card">
            <div class="card-body" style="overflow:auto;">
                <h5 class="card-title" >All Deliverables</h5>
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
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">state</th>
                            <th scope="col">Year</th>
                            <th scope="col">Quarter</th>
                            <th scope="col">Deliverable</th>
                            <th scope="col">Achieved</th>
                            <th scope="col">status</th>
                            <th scope="col">Date</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tabledata as $infos => $data)
                            <tr>
                                <th scope="row">
                                    {{ $infos + 1 }}
                                </th>
                                <td>
                                    {{ ucwords($data->state) }}
                                </td>
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
                                    {{ config('app.status')[$data->status] }}
                                </td>
                                <td>
                                    {{ date('Y M/d H:i a', strtotime($data->created_at)) }}
                                </td>
                                {{-- <td class="">
                                    <div class="d-flex">
                                        <a href=""
                                            class="btn btn-info btn-sm mx-2 text-light"> Edit</a>
                                    </div>
                                </td> --}}
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
