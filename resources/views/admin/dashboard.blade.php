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
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          {{-- <li class="breadcrumb-item">Tables</li> --}}
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    @if (session()->has('delete'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
        {{ session('delete') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('match'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
        {{ session('match') }}
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
                <table class="table datatable" >
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">type</th>
                      <th scope="col">Value/Name</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Updated At</th>
                      <th scope="col">Action</th>
                      {{-- <th scope="col">Delete</th> --}}
                      {{-- <th scope="col">Start Date</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                   @forelse ($infos as $info => $data)

                    <tr>
                      <th scope="row">{{ $data->id }}</th>
                      <td>{{ $data->type }}</td>
                      <td>{{ $data->value }}</td>
                      <td>{{ $data->created_at }}</td>
                      <td>{{ $data->updated_at }}</td>
                      <td class="d-flex justify-content-around">
                        <a href="{{ route('edit',$data->id) }}" class="btn btn-info btn-sm mx-2"><i class="bi bi-info-circle"></i> Edit</a>
                        <form action="{{ route('delete', $data->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <input class="btn btn-danger" type="submit" value="delete"/>
                        </form>
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
    @include('admin.includes.footer')
  <!-- End Footer -->

  @include('admin.includes.script')

</body>

</html>