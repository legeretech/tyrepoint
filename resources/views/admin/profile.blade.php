@extends('admin.layout')
@section('admin-body')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12 col-sm-8 d-flex flex-column align-items-center justify-content-center">

                <!-- <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="/admin_assets/assets/img/logo.png" alt="">
                        <span class="d-none d-lg-block">ADMIN</span>
                    </a>
                </div>End Logo -->

                <div class="card mb-3">

                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Edit Profile</h5>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @foreach ($profile as $value )
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <form class="row g-3 needs-validation" novalidate method="post" action="{{ route('profile_action') }}">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Name</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="name" class="form-control" value="{{$value->name}}" id="yourUsername" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="email" class="form-control" value="{{$value->email}}" id="yourUsername" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="New Password" id="yourPassword">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Update Profile </button>
                            </div>
                            <div class="col-12">
                                @error('excel_file')
                                <p class="text-primary">{{$message}}</p>
                                @enderror
                            </div>
                        </form>
                        @endforeach
                    </div>

                </div>

                <div class="credits">
                </div>

            </div>
        </div>
    </div>

</section>
@endsection