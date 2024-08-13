@extends('admin.layout')
@section('admin-body')
<section class="section">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card ">
                <div class="card-body">
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
                    <h5 class="card-title">Customer Details</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sl no</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Telephone</th>
                                <th>Registration Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($customer as $value)
                            <tr data-index="0">
                                <td>{{$i}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->telephone}}</td>
                                <td>{{$value->registration_no}}</td>
                            </tr>
                            @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection