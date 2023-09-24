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
            <h1>Indicator Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Indicator</a></li>
                    {{-- <li class="breadcrumb-item">Tables</li> --}}
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
            <button class="btn btn-primary" onclick="window.location.href='{{ route('admin') }}'"> Back</button>
        </div>

        <!-- End Page Title -->
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

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
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Type of Event</th>
                                        <th scope="col">Title of Event</th>
                                        <th scope="col">Output</th>
                                        <th scope="col">Location of training</th>
                                        <th scope="col">Target Beneficiaries</th>
                                        <th scope="col">Venue of the Training</th>
                                        <th scope="col"> Quarter</th>
                                        <th scope="col"> Expected No of Days</th>
                                        <th scope="col"> Actual No of Days</th>
                                        <th scope="col"> Start Date</th>
                                        <th scope="col"> End Date</th>
                                        <th scope="col"> Female</th>
                                        <th scope="col"> Male</th>
                                        <th scope="col"> PWD Male</th>
                                        <th scope="col"> PWD Female</th>
                                        <th scope="col"> Total</th>
                                        <th scope="col"> Activity Code</th>
                                        <th scope="col"> Indicator Number</th>
                                        <th scope="col"> Indicator</th>
                                        <th scope="col"> Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventdata as $info => $data)
                                    <tr>
                                        <th scope="row">{{ $info +1 }}</th>
                                        <td>{{ date("Y",strtotime($data->year)) }}</td>
                                        <td>
                                            {{ $data->type_of_event }}
                                        </td>
                                        <td>
                                            {{ $data->title_of_event }}
                                        </td>
                                        <td>
                                            {{ $data->output }}
                                        </td>
                                        <td>
                                            {{ $data->location_of_training }}
                                        </td>
                                        <td>
                                            {{ $data->target_bene }}
                                        </td>
                                        <td>
                                            {{ $data->venue_of_training }}
                                        </td>
                                        <!-- <td>
                                              {{ $data->type_of_event }}
                                            </td> -->
                                        <td>
                                            {{ $data->quarter }}
                                        </td>
                                        <td>
                                            {{ $data->expected_no_days }}
                                        </td>
                                        <td>
                                            {{ $data->actual_no_days }}
                                        </td>
                                        <td>
                                            {{ $data->start_date }}
                                        </td>
                                        <td>
                                            {{ $data->end_date }}
                                        </td>
                                        <td>
                                            {{ $data->p_female }}
                                        </td>
                                        <td>
                                            {{ $data->p_male }}
                                        </td>
                                        <td>
                                            {{ $data->p_pwd_male }}
                                        </td>
                                        <td>
                                            {{ $data->p_pwd_female }}
                                        </td>
                                        <td>
                                            {{ $data->p_total }}
                                        </td>
                                        <td>
                                            {{ $data->activity_code }}
                                        </td>
                                        <td>
                                            {{ $data->indicator_no }}
                                        </td>
                                        <td>{{ $data->indicator }}</td>
                                        <td class="d-flex justify-content-around">
                                            <form action="{{route('admin_event_delete',$data->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger" type="submit" value="delete" />
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>