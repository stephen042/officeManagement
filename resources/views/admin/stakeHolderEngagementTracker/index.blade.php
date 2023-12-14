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
            <h1>Event Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Event</a></li>
                    <li class="breadcrumb-it/em">Tables</li>
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
                            <a href="{{ route('stakeHolderEngagementTracker_csv') }}" class="btn btn-primary my-2">Generate CSV all Records</a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date of interaction</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Programme Year</th>
                                        <th scope="col">Quarter</th>
                                        <th scope="col">Type of Stakeholders</th>
                                        <th scope="col">Designation of Stakeholders</th>
                                        <th scope="col"> Output</th>
                                        <th scope="col"> PLANE Theme</th>
                                        <th scope="col"> Resolution Reached</th>
                                        <th scope="col"> Action taken on Resolution</th>
                                        <th scope="col"> Date Action Taken</th>
                                        <th scope="col"> Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $tableDatas as $tableData => $data )
                                    <tr>
                                        <td scope="col">{{ $tableData +1 }}</td>
                                       
                                        <td scope="col">{{ date("Y/M/d", strtotime($data->Date_of_interaction )) }}</td>
                                        <td scope="col">{{ $data->state }}</td>
                                        <td scope="col">{{ date("Y M", strtotime($data->Programme_Year_From))}} - {{ date("Y M", strtotime($data->Programme_Year_To))}}</td>
                                        <td scope="col">{{ $data->quarter }}</td>
                                        <td scope="col">{{ $data->Type_of_Stakeholders }}</td>
                                        <td scope="col">{{ $data->Designation_of_Stakeholders }}</td>
                                        <td scope="col"> {{ $data->output }}</td>
                                        <td scope="col"> {{ $data->Plane_Theme }}</td>
                                        <td scope="col">{{ $data->Resolution_reached }}</td>
                                        <td scope="col"> {{ $data->Action_taken_on_Resolution }}</td>
                                        <td scope="col"> {{ $data->Date_Action_Taken }}</td>
                                        <td class="d-flex justify-content-around">
                                            <form action="{{route('delete-stakeholderEngagementTracker',$data->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger" type="submit" value="delete" />
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        no data
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

    <!-- ======= Footer ======= -->
    @include('admin.includes.footer')
    <!-- End Footer -->

    @include('admin.includes.script')

</body>

</html>