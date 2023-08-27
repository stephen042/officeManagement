<!DOCTYPE html>
<html lang="en">

<head>
    @include('../admin.includes.head')
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-block align-items-center w-auto">
                                    {{-- <img src="{{ URL('assets/home/logo2.jpg') }}" alt=""> --}}
                                    <span class="d-none d-lg-block">PLANE Routine Data Management Information System</span>
                                </a>
                            </div>
                            <!-- End Logo -->

                            {{-- for logout popup --}}
                            @if (session()->has('message'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <center>
                                            <img src="{{ URL('assets/home/logo2.jpg') }}" class="" width="110px" height="40px" alt="Logo">
                                        </center>
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your State analysis</h5>
                                        <p class="text-center small">Enter your state & password to login</p>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate action="{{ route('login_post') }}" method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">State</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="state" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your state</div>
                                                @error('email')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">State Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                            @error('password')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                            <div class="credits">

                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
    <!-- End #main -->


    @include('../admin.includes.script')

</body>

</html>