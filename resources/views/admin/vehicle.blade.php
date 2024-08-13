@extends('admin.layout')

@section('admin-body')
<section class="section">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body bg-100 bg-light">
                    <h5 class="card-title">Vehicle Info</h5>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" style="margin-right: 10px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModalexcel"> Import Excel
                        </button>
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
                    <div style="overflow-x: auto;">
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Customer Name</th>
                                    <th>Telephone number</th>
                                    <th>Vehicle Make</th>
                                    <th>Registration Number</th>
                                    <th>ODO Metre Reading (KM)</th>
                                    <th>Avrge. run/ day</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($vehicle_info as $value)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->telephone}}</td>
                                    <td>{{$value->vehicle_model}}</td>
                                    <td>{{$value->registration_no}}</td>
                                    <td>{{$value->ODO_meter_reading}}</td>
                                    <td>{{$value->average_run_per_day}}</td>
                                </tr>
                                @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="fullscreenModalexcel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excel Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/admin/upload/order" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-3 col-md-3 col-form-label">Upload</label>
                        <div class="col-12 col-sm-12 col-md-9 col-lg-12">
                            <input class="form-control" class="col-md-10" type="file" name="excel_file" id="excel_file">
                        </div>
                    </div>
                    @error('excel_file')
                    <p class="text-primary">{{$message}}</p>
                    @enderror
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection