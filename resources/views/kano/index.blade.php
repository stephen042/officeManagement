<!DOCTYPE html>
<html lang="en">

<head>

    @include('kano.includes.head')

</head>

<body>

    <!-- ======= Header ======= -->
    @include('kano.includes.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('kano.includes.sidebar');
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>OutPut Lists</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    {{-- <li class="breadcrumb-item">Tables</li> --}}
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        {{-- @if (session()->has('delete'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
        {{ session('delete') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}

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
                        <div class="card-body" style="overflow:auto;">
                            {{-- <h5 class="card-title">Datatables</h5> --}}
                            {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">output</th>
                                        <th scope="col">indicator</th>
                                        <th scope="col">Target</th>
                                        {{-- <th scope="col">Updated At</th>  --}}
                                        <th scope="col">Action</th>
                                        {{-- <th scope="col">Delete</th> --}}
                                        {{-- <th scope="col">Start Date</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($outputTable as $info => $data)
                                        <tr>
                                            <th scope="row">{{ $info +1 }}</th>
                                            <td>{{ $data->output }}</td>
                                            <td>
                                              {{ $data->indicator }}
                                            </td>
                                            <td>{{ $data->target }}</td>

                                            <td class="d-flex justify-content-around">
                                              <a href="{{ route('edit_indicator',$data->id) }}"
                                                class="btn btn-info btn-sm mx-2"><i class="bi bi-info-circle"></i>
                                                Edit
                                              </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th scope="row"></th>
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
    @include('kano.includes.footer')
    <!-- End Footer -->

    @include('kano.includes.script')

</body>

</html>
