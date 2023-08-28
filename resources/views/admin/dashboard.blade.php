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

        <div class="pagetitle">
            <h1>Admin Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        @foreach ($stateinfo as $info => $data)
                          <div class="col-xxl-4 col-md-4">
                              <div class="card info-card sales-card">
                                <a href="{{ route('states',[$data->id]) }}">
                                  <div class="card-body">
                                      <h5 class="card-title">State <span>| DATA</span></h5>

                                      <div class="d-flex align-items-center">
                                          <div
                                              class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <i class="bi bi-people"></i>
                                          </div>
                                          <div class="ps-3">
                                              <h6>{{ $data->state }} </h6>
                                              <span class="text-success small pt-1 fw-bold">ACTIVE</span> <span
                                                  class="text-muted small pt-2 ps-1"></span>

                                          </div>
                                      </div>
                                  </div>
                                </a>
                              </div>
                          </div>
                        @endforeach

                        <!-- End Sales Card -->
                        <hr>
                        <div class="card">
                            <div class="card-body" style="overflow:auto;">
                                {{-- <h5 class="card-title">Datatables</h5> --}}
                                {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">state</th>
                                            <th scope="col">output</th>
                                            <th scope="col">indicator</th>
                                            <th scope="col">Target</th>
                                            {{-- <th scope="col">Deliverables</th> --}}
                                            <!-- <th scope="col">Action</th> -->
                                            <!-- {{-- <th scope="col">Delete</th> --}} -->
                                            <!-- {{-- <th scope="col">Start Date</th> --}} -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tabledata as $info => $data)
                                        <tr>
                                                <th scope="row">{{ $info + 1 }}</th>
                                                <td>{{ $data->state }}</td>
                                                <td>
                                                    {{ $data->output }}
                                                </td>
                                                <td>
                                                    {{ $data->indicator }}
                                                </td>
                                                <td>{{ $data->target }}</td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td height="10">
                                                {{-- Number of Evidences informed Policies and plan drafted, reviewed and
                                                endorsed promote gender equality, safeguarding and disability inclusion
                                                in education --}}
                                            </td>
                                            <td></td>
                                            <td>
                                                {{-- <div class="d-flex">
                                                    <a href="" class="btn btn-info btn-sm mx-2"> Edit</a>
                                                    <form action="" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input class="btn btn-danger" type="submit" value="delete" />
                                                    </form>
                                                </div> --}}

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
                <!-- End Left side columns -->
            </div>
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>
