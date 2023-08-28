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
        <button onclick="window.history.back()" class="btn btn-primary my-2">back</button>
        <hr>
        <div class="card">
            <div class="card-body" style="overflow:auto;">
                <h5 class="card-title">Details : {{ ucwords($userinfo->state )}}</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Output</th>
                            <th scope="col">Indicator</th>
                            <th scope="col">Target</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($outputinfo as $info => $data )
                        <tr>
                            <th scope="row">{{ $info +1 }}</th>
                            <td>
                                {{ $data->output }}
                            </td>
                            <td>
                                {{ $data->indicator }}
                            </td>
                            <td>
                                {{ $data->target }}
                            </td>
                            <td>
                                {{ date('Y M/D H:i a') }}
                            </td>
                            <td>
                                <a href="" class="btn btn-info btn-sm mx-2"> View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
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