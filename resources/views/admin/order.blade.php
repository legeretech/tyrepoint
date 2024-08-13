@extends('admin.layout')
@section('admin-body')
<section class="section">
    <div class="row">
        <div>
            <div class="card">
                <div class="card-body bg-100 bg-light">
                    <h5 class="card-title">Order Data</h5>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">Add Order</button>
                        <button type="button" style="margin-right: 10px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModalexcel">Import Excel</button>
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
                        <table class="table table-striped table table-bordered ">
                            <thead>
                                <tr>
                                    <th rowspan="4" style="text-align: center;">Sl No</th>
                                    <th rowspan="4" style="text-align: center;">Bill No</th>
                                    <th rowspan="4" style="text-align: center;">Month</th>
                                    <th rowspan="4" style="text-align: center;">Date</th>
                                    <th rowspan="4" style="text-align: center;">Vehicle Make</th>
                                    <th rowspan="4" style="text-align: center;">Wheel size</th>
                                    <th rowspan="4" style="text-align: center;">Wheel (A/O)</th>
                                    <th rowspan="4" style="text-align: center;">Registration Number</th>
                                    <th rowspan="4" style="text-align: center;">ODO Reading</th>
                                    <th rowspan="4" style="text-align: center;">@/per Day KM</th>
                                    <th rowspan="4" style="text-align: center;">Name</th>
                                    <th rowspan="4" style="text-align: center;">Address</th>
                                    <th rowspan="4" style="text-align: center;">Phone Number</th>
                                    <th colspan="6" rowspan="2" style="text-align: center;">Tyre Fitment</th>
                                    <th colspan="6" rowspan="2" style="text-align: center;">Wheel Balancing</th>
                                    <th colspan="6" rowspan="2" style="text-align: center;">Gram Weight Used</th>
                                    <th colspan="36" style="text-align: center;">Wheel Alignment</th>
                                    <th colspan="25" style="text-align: center;">Tyre Wear Condition</th>
                                    <th rowspan="4" style="text-align: center;">Others (N2, Pnctre repair, ..)</th>
                                    <th colspan="5" rowspan="2" style="text-align: center;">Tyre Purchase</th>
                                    <th colspan="8" rowspan="2" style="text-align: center;">TOTAL</th>
                                    <th rowspan="4" style="text-align: center;">Discount</th>
                                    <th rowspan="4" style="text-align: center;">Grand Total</th>
                                    <th rowspan="4" style="text-align: center;">Amount Received</th>
                                    <th rowspan="4" style="text-align: center;">Total GST</th>
                                    <th rowspan="4" style="text-align: center;">CGST Amount Received</th>
                                    <th rowspan="4" style="text-align: center;">SGST Amount Received</th>
                                    <th rowspan="4" style="text-align: center;">Remarks</th>
                                    <th rowspan="4" style="text-align: center;">Action</th>
                                    <th rowspan="4" style="text-align: center;">Invoice</th>
                                    <th rowspan="4" style="text-align: center;">Warranty</th>
                                </tr>
                                <tr>
                                    <th colspan="24" style="text-align: center;">Existing Reading</th>
                                    <th colspan="12" style="text-align: center;">Corrected Reading</th>
                                    <th colspan="5" style="text-align: center;">Imposer Wear at Inner Shoulder</th>
                                    <th colspan="5" style="text-align: center;">Imposer Wear at Outer Shoulder</th>
                                    <th colspan="5" style="text-align: center;">Uneven Wear</th>
                                    <th colspan="5" style="text-align: center;">Air Pressure Before</th>
                                    <th colspan="5" style="text-align: center;">Air Pressure After</th>

                                <tr>
                                    <th rowspan="2" style="text-align: center;">Left Front</th>
                                    <th rowspan="2" style="text-align: center;">Right Front</th>
                                    <th rowspan="2" style="text-align: center;">Left Rear</th>
                                    <th rowspan="2" style="text-align: center;">Right Rear</th>
                                    <th rowspan="2" style="text-align: center;">Stepney</th>
                                    <th rowspan="2" style="text-align: center;">No of Tyres</th>
                                    <th rowspan="2" style="text-align: center;">Left Front</th>
                                    <th rowspan="2" style="text-align: center;">Right Front</th>
                                    <th rowspan="2" style="text-align: center;">Left Rear</th>
                                    <th rowspan="2" style="text-align: center;">Right Rear</th>
                                    <th rowspan="2" style="text-align: center;">Stepney</th>
                                    <th rowspan="2" style="text-align: center;">Total</th>
                                    <th rowspan="2" style="text-align: center;">Left Front</th>
                                    <th rowspan="2" style="text-align: center;">Right Front</th>
                                    <th rowspan="2" style="text-align: center;">Left Rear</th>
                                    <th rowspan="2" style="text-align: center;">Right Rear</th>
                                    <th rowspan="2" style="text-align: center;">Stepney</th>
                                    <th rowspan="2" style="text-align: center;">Total</th>
                                    <th colspan="4" style="text-align: center;">Castor</th>
                                    <th colspan="4" style="text-align: center;">Camber</th>
                                    <th colspan="4" style="text-align: center;">Toe-in</th>
                                    <th colspan="4" style="text-align: center;">Tot </th>
                                    <th colspan="4" style="text-align: center;">K.P.I</th>
                                    <th colspan="4" style="text-align: center;">Remarks</th>
                                    <th colspan="2" style="text-align: center;">Castor</th>
                                    <th colspan="2" style="text-align: center;">Camber</th>
                                    <th colspan="2" style="text-align: center;">Toe-in</th>
                                    <th colspan="2" style="text-align: center;">Tot </th>
                                    <th colspan="2" style="text-align: center;">K.P.I</th>
                                    <th colspan="2" style="text-align: center;">Remarks</th>
                                    <th rowspan="2" style="text-align: center;">Left Front</th>
                                    <th rowspan="2" style="text-align: center;">Right Front</th>
                                    <th rowspan="2" style="text-align: center;">Left Rear</th>
                                    <th rowspan="2" style="text-align: center;">Right Rear</th>
                                    <th rowspan="2" style="text-align: center;">Stepney</th>
                                    <th rowspan="2" style="text-align: center;">Left Front</th>
                                    <th rowspan="2" style="text-align: center;">Right Front</th>
                                    <th rowspan="2" style="text-align: center;">Left Rear</th>
                                    <th rowspan="2" style="text-align: center;">Right Rear</th>
                                    <th rowspan="2" style="text-align: center;">Stepney</th>
                                    <th rowspan="2" style="text-align: center;">Left Front</th>
                                    <th rowspan="2" style="text-align: center;">Right Front</th>
                                    <th rowspan="2" style="text-align: center;">Left Rear</th>
                                    <th rowspan="2" style="text-align: center;">Right Rear</th>
                                    <th rowspan="2" style="text-align: center;">Stepney</th>
                                    <th rowspan="2" style="text-align: center;">Left Front</th>
                                    <th rowspan="2" style="text-align: center;">Right Front</th>
                                    <th rowspan="2" style="text-align: center;">Left Rear</th>
                                    <th rowspan="2" style="text-align: center;">Right Rear</th>
                                    <th rowspan="2" style="text-align: center;">Stepney</th>
                                    <th rowspan="2" style="text-align: center;">Left Front</th>
                                    <th rowspan="2" style="text-align: center;">Right Front</th>
                                    <th rowspan="2" style="text-align: center;">Left Rear</th>
                                    <th rowspan="2" style="text-align: center;">Right Rear</th>
                                    <th rowspan="2" style="text-align: center;">Stepney</th>
                                    <th rowspan="2" style="text-align: center;">Brand</th>
                                    <th rowspan="2" style="text-align: center;">Pattern</th>
                                    <th rowspan="2" style="text-align: center;">Serial NO</th>
                                    <th rowspan="2" style="text-align: center;">Rate</th>
                                    <th rowspan="2" style="text-align: center;">Count</th>
                                    <th rowspan="2" style="text-align: center;">Tyre Fitment</th>
                                    <th rowspan="2" style="text-align: center;">Wheel Balancing</th>
                                    <th rowspan="2" style="text-align: center;">Gram Weight Used</th>
                                    <th rowspan="2" style="text-align: center;">Wheel Alignment</th>
                                    <th rowspan="2" style="text-align: center;">Others (N2, Pnctre repair, ..)</th>
                                    <th rowspan="2" rowspan="2" style="text-align: center;">Tyre Purchase</th>
                                    <th rowspan="2" rowspan="2" style="text-align: center;">TOTAL</th>
                                </tr>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Rear</th>
                                    <th style="text-align: center;">Right Rear</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Rear</th>
                                    <th style="text-align: center;">Right Rear</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Rear</th>
                                    <th style="text-align: center;">Right Rear</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Rear</th>
                                    <th style="text-align: center;">Right Rear</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Rear</th>
                                    <th style="text-align: center;">Right Rear</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Rear</th>
                                    <th style="text-align: center;">Right Rear</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                    <th style="text-align: center;">Left Front</th>
                                    <th style="text-align: center;">Right Front</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Modal Section -->
<div class="modal fade" id="fullscreenModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Inspection Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <div class="modal-body">
                <!-- <form class="row g-3" action="/admin/order_action" method="post"> -->
                <form class="row g-3" action="#" method="">
                    @csrf
                    <div class="row">
                        <div id="part1" class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" class="form-control" name="date" id="date" required>

                                    </div>

                                    <div class="col-sm-4">
                                        <label for="vehicle_reg" class="form-label">Vehicle Registration Number</label>
                                        <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" name="vehicle_reg" id="vehicle_reg" required list="vehicle_reg_list">
                                        <datalist id="vehicle_reg_list">
                                            @foreach ($vehicle_reg as $value)
                                            <option value="{{$value->registration_no}}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="make" class="form-label">Make</label>
                                        <select class="form-control" name="make" id="make" required>
                                            <option value="" selected disabled>Select the vehicle Make</option>
                                            @foreach ($Allignments as $value)
                                            <option value="{{$value->Mfg}}" data-rate="{{$value->rate}}">{{$value->Mfg}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="ODO_meter_reading" class="form-label">ODO Meter Reading (KM)</label>
                                        <input type="text" class="form-control" name="ODO_meter_reading" id="ODO_meter_reading" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="average_run_per_day" class="form-label">Average Run/Day</label>
                                        <input type="text" class="form-control" name="average_run_per_day" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="wheel_size" class="form-label">Wheel Size</label>
                                        <input type="text" class="form-control" name="wheel_size" id="wheel_size" min="12" max="24" required>
                                        <small id="wheel_size_error" class="form-text text-danger"></small>

                                    </div>

                                    <div class="col-sm-4">
                                        <label for="whl_a_or_o" class="form-label">Wheel Alloy or Ordinary</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="whl_a_or_o" id="alloy_wheels" value="A">
                                                <label class="form-check-label" for="alloy_wheels">
                                                    Alloy Wheels
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="whl_a_or_o" id="ordinary_wheels" value="O">
                                                <label class="form-check-label" for="ordinary_wheels">
                                                    Ordinary Wheels
                                                </label>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-sm-12 d-flex justify-content-center mt-5">
                                        <button type="button" class="btn btn-primary w-25 mr-5" id="next1">Save</button>
                                        <!-- <button type="reset" class="btn btn-secondary w-25 ml-3">Reset</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="part2" class="card" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title">Customer Details</h5>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="telephon" class="form-label">Telephone</label>
                                        <input type="text" class="form-control" name="telephone" id="telephone" placeholder="WhatsApp Number" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" name="address" id="address" required></textarea>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-center mt-5">
                                        <button type="button" class="btn btn-primary w-25 mr-5" id="next2">Save</button>
                                        <button type="button" class="btn btn-primary w-25" id="back2">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="part3" class="card" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title">Tyre Fitment</h5>
                                <div style="overflow-x: auto;">
                                    <table class="table table-bordered border-dark">
                                        <thead>
                                            <tr>
                                                <th>Left Front (L/F)</th>
                                                <th>Right Front (R/F)</th>
                                                <th>Left Rear (L/R)</th>
                                                <th>Right Rear (R/R)</th>
                                                <th>Stepney</th>
                                                <th>No of Tyres</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" name="fitment[]" value="L/F"></td>
                                                <td><input type="checkbox" name="fitment[]" value="R/F"></td>
                                                <td><input type="checkbox" name="fitment[]" value="L/R"></td>
                                                <td><input type="checkbox" name="fitment[]" value="R/R"></td>
                                                <td><input type="checkbox" name="fitment[]" value="stepney"></td>
                                                <td><input type="text" class="form-control" name="tyre_fitment_count" id="tyre_fitment_count" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-sm-12 d-flex justify-content-center mt-3">
                                        <button type="button" class="btn btn-primary w-25 mr-3" id="next3">Save</button>
                                        <button type="button" class="btn btn-primary w-25" id="back3">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="part5" class="card" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title">Others</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Do you want to specify other types?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="other_option" id="other_yes" value="yes">
                                                <label class="form-check-label" for="other_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="other_option" id="other_no" value="no">
                                                <label class="form-check-label" for="other_no">No</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="other_options" class="col-md-12 mt-3" style="display: none;">
                                        <label class="form-label">Others (N2, Puncture Repair, etc.) Type</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="other_type[]" value="tubeless" id="other_type_tubeless">
                                                            <label class="form-check-label" for="other_type_tubeless">Tubeless</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="price_tubeless_field" style="display: none;">
                                                        <div class="form-group">
                                                            <label for="price_tubeless">Price</label>
                                                            <input type="number" class="form-control" name="price_tubeless" id="price_tubeless" step="0.01">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="other_type[]" value="nitrogen" id="other_type_nitrogen">
                                                            <label class="form-check-label" for="other_type_nitrogen">Nitrogen</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="price_nitrogen_field" style="display: none;">
                                                        <div class="form-group">
                                                            <label for="price_nitrogen">Price</label>
                                                            <input type="number" class="form-control" name="price_nitrogen" id="price_nitrogen" step="0.01">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="other_type[]" value="tyre_rotation" id="other_type_tyre_rotation">
                                                            <label class="form-check-label" for="other_type_tyre_rotation">Tyre Rotation</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="price_tyre_rotation_field" style="display: none;">
                                                        <div class="form-group">
                                                            <label for="price_tyre_rotation">Price</label>
                                                            <input type="number" class="form-control" name="price_tyre_rotation" id="price_tyre_rotation" step="0.01">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="other_type[]" value="other" id="other_type_other">
                                                            <label class="form-check-label" for="other_type_other">Others</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="other_fields" style="display: none;">
                                                        <div class="form-group">
                                                            <label for="other_text">Description</label>
                                                            <input type="text" class="form-control" name="other_text" id="other_text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price_other_text">Price</label>
                                                            <input type="number" class="form-control" name="price_other_text" id="price_other_text" step="0.01">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-center mt-5">
                                        <button type="button" class="btn btn-primary w-25 mr-5" id="next5">Save</button>
                                        <button type="button" class="btn btn-primary w-25" id="back5">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="part4" class="card" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title">Wheel Balancing</h5>
                                <div style="overflow-x: auto;">
                                    <table class="table table-bordered border-dark">
                                        <thead>
                                            <tr>
                                                <th>Left Front (L/F)</th>
                                                <th>Right Front (R/F)</th>
                                                <th>Left Rear (L/R)</th>
                                                <th>Right Rear (R/R)</th>
                                                <th>Stepney</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" name="balancing[]" value="L/F"></td>
                                                <td><input type="checkbox" name="balancing[]" value="R/F"></td>
                                                <td><input type="checkbox" name="balancing[]" value="L/R"></td>
                                                <td><input type="checkbox" name="balancing[]" value="R/R"></td>
                                                <td><input type="checkbox" name="balancing[]" value="stepney"></td>
                                                <td><input type="text" class="form-control" name="wheel_blancing_count" id="wheel_blancing_count" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <h5 class="card-title mt-4">Wheel Balancing Weight Used (In gms)</h5>
                                <div style="overflow-x: auto;">
                                    <table class="table table-bordered border-dark">
                                        <thead>
                                            <tr>
                                                <th>Left Front (L/F)</th>
                                                <th>Right Front (R/F)</th>
                                                <th>Left Rear (L/R)</th>
                                                <th>Right Rear (R/R)</th>
                                                <th>Stepney</th>
                                                <th>Total Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" name="weight_l_f" id="weight_l_f"></td>
                                                <td><input type="text" class="form-control" name="weight_r_f" id="weight_r_f"></td>
                                                <td><input type="text" class="form-control" name="weight_l_r" id="weight_l_r"></td>
                                                <td><input type="text" class="form-control" name="weight_r_r" id="weight_r_r"></td>
                                                <td><input type="text" class="form-control" name="weight_stepney" id="weight_stepney"></td>
                                                <td><input type="text" class="form-control" name="weight_total" id="weight_total"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-12 d-flex justify-content-center mt-5">
                                    <button type="button" class="btn btn-primary w-25 mr-3" id="next4">Save</button>
                                    <button type="button" class="btn btn-primary w-25" id="back4">Back</button>
                                </div>
                            </div>
                        </div>

                        <div id="part6" class="card" style="display: none;">
                            <div class="card-body">
                                <div class="card">
                                    <h5 class="card-title">Wheel Alignment</h5>
                                    <div>
                                        Yes <input type="radio" name="alignment" id="alignment_yes" value="yes">
                                        No <input type="radio" name="alignment" id="alignment_no" value="no">
                                    </div>

                                    <div style="overflow-x: auto; display: none;" id="alignment_table">
                                        <table class="table table-bordered border-dark">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"></th>
                                                    <th>Castor</th>
                                                    <th>Camber</th>
                                                    <th>Toe_In</th>
                                                    <th>Total Toe (TOT)</th>
                                                    <th>Kingpin Inclination (KPI)</th>
                                                    <!-- <th>Total Count</th> -->
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th rowspan="5">Existing <br> Reading</th>
                                                </tr>
                                                <tr>
                                                    <th>Left Front (L/F)</th>
                                                    <td><input type="checkbox" name="alignment_l_f_exst[]" value="alignment_l_f_exst_castor"></td>
                                                    <td><input type="checkbox" name="alignment_l_f_exst[]" value="alignment_l_f_exst_camber"></td>
                                                    <td><input type="checkbox" name="alignment_l_f_exst[]" value="alignment_l_f_exst_toein"></td>
                                                    <td><input type="checkbox" name="alignment_l_f_exst[]" value="alignment_l_f_exst_tot"></td>
                                                    <td><input type="checkbox" name="alignment_l_f_exst[]" value="alignment_l_f_exst_kpi"></td>
                                                    <td><textarea class="form-control" name="alignment_l_f_exst_remarks"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <th>Right Front (R/F)</th>
                                                    <td><input type="checkbox" name="alignment_r_f_exst[]" value="alignment_r_f_exst_castor"></td>
                                                    <td><input type="checkbox" name="alignment_r_f_exst[]" value="alignment_r_f_exst_camber"></td>
                                                    <td><input type="checkbox" name="alignment_r_f_exst[]" value="alignment_r_f_exst_toein"></td>
                                                    <td><input type="checkbox" name="alignment_r_f_exst[]" value="alignment_r_f_exst_tot"></td>
                                                    <td><input type="checkbox" name="alignment_r_f_exst[]" value="alignment_r_f_exst_kpi"></td>
                                                    <td><textarea class="form-control" name="alignment_r_f_exst_remarks"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <th>Left Rear (L/R)</th>
                                                    <td><input type="checkbox" name="alignment_l_r_exst[]" value="alignment_l_r_exst_castor"></td>
                                                    <td><input type="checkbox" name="alignment_l_r_exst[]" value="alignment_l_r_exst_camber"></td>
                                                    <td><input type="checkbox" name="alignment_l_r_exst[]" value="alignment_l_r_exst_toein"></td>
                                                    <td><input type="checkbox" name="alignment_l_r_exst[]" value="alignment_l_r_exst_tot"></td>
                                                    <td><input type="checkbox" name="alignment_l_r_exst[]" value="alignment_l_r_exst_kpi"></td>
                                                    <td><textarea class="form-control" name="alignment_l_r_exst_remarks"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <th>Right Rear (R/R)</th>
                                                    <td><input type="checkbox" name="alignment_r_r_exst[]" value="alignment_r_r_exst_castor"></td>
                                                    <td><input type="checkbox" name="alignment_r_r_exst[]" value="alignment_r_r_exst_camber"></td>
                                                    <td><input type="checkbox" name="alignment_r_r_exst[]" value="alignment_r_r_exst_toein"></td>
                                                    <td><input type="checkbox" name="alignment_r_r_exst[]" value="alignment_r_r_exst_tot"></td>
                                                    <td><input type="checkbox" name="alignment_r_r_exst[]" value="alignment_r_r_exst_kpi"></td>
                                                    <td><textarea class="form-control" name="alignment_r_r_exst_remarks"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3">Corrected <br> Reading</th>
                                                </tr>
                                                <tr>
                                                    <th>Left Front (L/F)</th>
                                                    <td><input type="checkbox" name="alignment_l_f[]" value="alignment_l_f_castor"></td>
                                                    <td><input type="checkbox" name="alignment_l_f[]" value="alignment_l_f_camber"></td>
                                                    <td><input type="checkbox" name="alignment_l_f[]" value="alignment_l_f_toein"></td>
                                                    <td><input type="checkbox" name="alignment_l_f[]" value="alignment_l_f_tot"></td>
                                                    <td><input type="checkbox" name="alignment_l_f[]" value="alignment_l_f_kpi"></td>
                                                    <td><textarea class="form-control" name="alignment_l_f_remarks"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <th>Right Front (R/F)</th>
                                                    <td><input type="checkbox" name="alignment_r_f[]" value="alignment_r_f_castor"></td>
                                                    <td><input type="checkbox" name="alignment_r_f[]" value="alignment_r_f_camber"></td>
                                                    <td><input type="checkbox" name="alignment_r_f[]" value="alignment_r_f_toein"></td>
                                                    <td><input type="checkbox" name="alignment_r_f[]" value="alignment_r_f_tot"></td>
                                                    <td><input type="checkbox" name="alignment_r_f[]" value="alignment_r_f_kpi"></td>
                                                    <td><textarea class="form-control" name="alignment_r_f_remarks"></textarea></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-center mt-5">
                                        <button type="button" class="btn btn-primary w-25 mr-3" id="next6">Save</button>
                                        <button type="button" class="btn btn-primary w-25" id="back6">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="part7" class="card" style="display: none;">
                            <div class="card-body">
                                <div style="overflow-x: auto;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="card-title">Tyre Condition</h5>
                                            <table class="table table-bordered border-dark">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" colspan="2"></th>
                                                        <th colspan="2">Front</th>
                                                        <th colspan="2">Rear</th>
                                                        <th rowspan="2">Stepney</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Left</th>
                                                        <th>Right</th>
                                                        <th>Left</th>
                                                        <th>Right</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2">Improper Wear At <br> Inner Shoulder</th>
                                                        <td><input type="checkbox" name="wear_inner" value="inner_f_l"></td>
                                                        <td><input type="checkbox" name="wear_inner" value="inner_f_r"></td>
                                                        <td><input type="checkbox" name="wear_inner" value="inner_r_l"></td>
                                                        <td><input type="checkbox" name="wear_inner" value="inner_r_r"></td>
                                                        <td><input type="checkbox" name="wear_inner" value="inner_stepney"></td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Improper Wear At <br> Outer Shoulder</th>
                                                        <td><input type="checkbox" name="wear_outer" value="outer_f_l"></td>
                                                        <td><input type="checkbox" name="wear_outer" value="outer_f_r"></td>
                                                        <td><input type="checkbox" name="wear_outer" value="outer_r_l"></td>
                                                        <td><input type="checkbox" name="wear_outer" value="outer_r_r"></td>
                                                        <td><input type="checkbox" name="wear_outer" value="outer_stepney"></td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Uneven Wear</th>
                                                        <td><input type="checkbox" name="wear_uneven" value="uneven_f_l"></td>
                                                        <td><input type="checkbox" name="wear_uneven" value="uneven_f_r"></td>
                                                        <td><input type="checkbox" name="wear_uneven" value="uneven_r_l"></td>
                                                        <td><input type="checkbox" name="wear_uneven" value="uneven_r_r"></td>
                                                        <td><input type="checkbox" name="wear_uneven" value="uneven_stepney"></td>
                                                    </tr>


                                                    <tr>
                                                        <th rowspan="2">Air Pressure</th>
                                                        <th>Before</th>
                                                        <td><input type="text" name="air_before_f_l" id="air_before_f_l"></td>
                                                        <td><input type="text" name="air_before_f_r" id="air_before_f_r"></td>
                                                        <td><input type="text" name="air_before_r_l" id="air_before_r_l"></td>
                                                        <td><input type="text" name="air_before_r_r" id="air_before_r_r"></td>
                                                        <td><input type="text" name="air_before_stepney" id="air_before_stepney"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>After</th>
                                                        <td><input type="text" name="air_after_f_l" id="air_after_f_l"></td>
                                                        <td><input type="text" name="air_after_f_r" id="air_after_f_r"></td>
                                                        <td><input type="text" name="air_after_r_l" id="air_after_r_l"></td>
                                                        <td><input type="text" name="air_after_r_r" id="air_after_r_r"></td>
                                                        <td><input type="text" name="air_after_stepney" id="air_after_stepney"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-sm-12 d-flex justify-content-center mt-5">
                                                <button type="button" class="btn btn-primary w-25 mr-5" id="next7">Save</button>
                                                <button type="button" class="btn btn-primary w-25" id="back7">Back</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="part8" class="card" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title">Remarks</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="before_remarks" class="form-label">Before</label>
                                        <textarea class="form-control" name="before_remarks" id="before_remarks"></textarea>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <label for="after_remarks" class="form-label">After</label>
                                        <textarea class="form-control" name="after_remarks" id="after_remarks"></textarea>
                                    </div> -->
                                    <div class="col-sm-12 d-flex justify-content-center mt-5">
                                        <button type="button" class="btn btn-primary w-25 mr-5" id="next8">Save</button>
                                        <button type="button" class="btn btn-primary w-25" id="back8">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="part9" class="card" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title">Tyre Purchase Details</h5>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="tyre_input" class="form-label">Tyre Size</label>
                                        <select class="form-control" name="tyre_size" id="tyre_size" required>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="tyre_brand" sty class="form-label">Tyre Brand</label>
                                        <select class="form-control" name="tyre_brand" id="tyre_brand">
                                            <!-- Options will be populated dynamically -->
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="tyre_pattern" class="form-label">Tyre Pattern</label>
                                        <select class="form-control" name="tyre_pattern" id="tyre_pattern">
                                            <!-- Options will be populated dynamically -->
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="no_of_tyre_purchased" class="form-label">No Of Tyre Purchased</label>
                                        <select class="form-control" name="no_of_tyre_purchased" id="no_of_tyre_purchased">
                                            <option value="" disabled selected>----Select---</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-sm-4">
            <label for="tyre_rate" class="form-label">Tyre Rate</label>0
            <input type="number" class="form-control" name="tyre_rate" id="tyre_rate">
        </div> -->
                                    <div class="col-sm-12">
                                        <label for="serial_no" class="form-label"></label>
                                        <div id="serial_no_container" class="row"></div>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-center mt-5">
                                        <button type="button" class="btn btn-primary w-25 mr-5" id="next9">Save</button>
                                        <button type="button" class="btn btn-primary w-25" id="back9">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div id="part10" class="card" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title">TOTAL</h5>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="overflow-x: auto;">
                                            <table class="table table-bordered border-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Tyre Fitment</th>
                                                        <th>Wheel Balancing</th>
                                                        <th>Wheel Alignment</th>
                                                        <th>Gram Weight Used</th>
                                                        <th>Tyre Purchase</th>
                                                        <th>Others</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="tyre_fitment" id="tyre_fitment"></td>
                                                        <td><input type="text" name="wheel_balancing" id="wheel_balancing"></td>
                                                        <td><input type="text" name="wheel_alignment" id="wheel_alignment"></td>
                                                        <td><input type="text" name="gram_weight_used" id="gram_weight_used"></td>

                                                        <td><input type="text" name="tyre_purchase" id="tyre_purchase"></td>
                                                        <td><input type="text" name="others" id="others"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-sm-12">
                                                <table class="table">
                                                    <tr>
                                                        <th>Total</th>
                                                        <td><input type="text" class="form-control" name="total" id="total" required></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Discount Amount</th>
                                                        <td><input type="text" class="form-control" name="discount_amount" id="discount_amount" required></td>

                                                    <tr>
                                                        <th>Net Amount</th>
                                                        <td><input type="text" class="form-control" name="net_amount" id="net_amount" required></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Minimum Amount to be</th>
                                                        <td><input type="text" class="form-control" name="net_amount" id="net_amount" required></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Amount Received</th>
                                                        <td><input type="text" class="form-control" name="total_gst" id="total_gst" required></td>
                                                    </tr>
                                                    <input type="hidden" class="form-control" name="sgst" id="sgst" required>
                                                    <input type="hidden" class="form-control" name="cgst" id="cgst" required>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-center mt-5">
                                            <!-- <button type="button" class="btn btn-primary w-25" id="back10">Back</button> -->
                                            <button type="button" class="btn btn-primary w-25" id="back10">Back</button>
                                            <button type="submit" class="btn btn-primary w-25 mr-5">Submit</button>

                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="/admin_assets/assets/js/tyre.js"></script>
<script src="/admin_assets/assets/js/order.js"></script>
<script src="/admin_assets/assets/js/brand.js"></script>


@endsection