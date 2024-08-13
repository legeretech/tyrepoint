@extends('admin.layout')
@section('admin-body')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
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
<section class="section dashboard">
    <div class="row">
        @if (auth()->user()->role->role == 'admin')
        <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-xxl-4 col-md-6 col-12 col-sm-12">
                    <div class="card info-card orders-card">
                        <div class="card-body">
                            <h5 class="card-title">Orders</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-list-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $order }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6 col-12 col-sm-12">
                    <div class="card info-card vehicle-info-card">
                        <div class="card-body">
                            <h5 class="card-title">Vehicle Info</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bx-car"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $vehicle_info }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Customers</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $customer }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        @endif

        <div class="col-lg-4">
            <!-- Additional content can go here -->
        </div>


    </div>
</section>
@endsection