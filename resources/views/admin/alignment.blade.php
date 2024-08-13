@extends('admin.layout')
@section('admin-body')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Wheel Alignment Data</h5>
                    <div style="margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;">
                        <input type="text" id="searchBox" style="width: 200px; padding: 5px;" placeholder="Search Manufacturer">
                        <div style="display: flex; gap: 10px;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialog"> Add Data </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModalexcel"> Import Excel </button>
                        </div>
                    </div>

                    @if (session('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger mt-2">
                        {{ session('error') }}
                    </div>
                    @endif
                    <table class="table" style="text-align:center">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Manufacturer</th>
                                <th>Vehicle Model</th>
                                <th>Mfg+Vehicle1</th>
                                <th>Algn Rate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="alignmentTableBody">
                            @php $i=1; @endphp
                            @foreach($alignments as $value)
                            <tr data-index="0" data-manufacturer="{{ $value->Manufacturer }}">
                                <td>{{$i}}</td>
                                <td>{{$value->Manufacturer}}</td>
                                <td>{{$value->Vehicle_Model}}</td>
                                <td>{{$value->Mfg}}</td>
                                <td>{{$value->rate}}</td>
                                <td>
                                    <a href="#editModal{{$value->id}}" class="btn" data-bs-toggle="modal"><i class="ri-edit-2-fill"></i></a>
                                    <a href="/admin/delete/alignment/{{$value->id}}" class="btn"><i class="ri-delete-bin-4-fill"></i></a>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchBox = document.getElementById('searchBox');
        const tableBody = document.getElementById('alignmentTableBody');
        const rows = tableBody.getElementsByTagName('tr');

        searchBox.addEventListener('input', function() {
            const searchText = searchBox.value.toLowerCase();
            Array.from(rows).forEach(row => {
                const manufacturer = row.getAttribute('data-manufacturer').toLowerCase();
                if (manufacturer.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>


<!-- Add Data Modal -->
<div class="modal fade" id="modalDialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Wheel Alignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/alignment_action" method="post">
                                    @csrf
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputManufacturer" class="form-label">Manufacturer</label>
                                        <input type="text" class="form-control" name="Manufacturer" placeholder="Manufacturer">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputVehicleModel" class="form-label">Vehicle Model</label>
                                        <input type="text" class="form-control" name="VehicleModel" placeholder="Vehicle Model">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputMfgVehicle" class="form-label">Mfg+Vehicle</label>
                                        <input type="text" class="form-control" name="Mfg+Vehicle" placeholder="Mfg+Vehicle">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputAlgnRate" class="form-label">Alignment Rate</label>
                                        <input type="text" class="form-control" name="algnRate" placeholder="Alignment Rate">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modals -->
@foreach ($alignments as $value)
<div class="modal fade" id="editModal{{$value->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Wheel Alignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/edit/alignment/{{$value->id}}" method="post">
                                    @csrf

                                    <!-- Edit Data Form Fields -->
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editManufacturer{{$value->id}}" class="form-label">Manufacturer</label>
                                        <input type="text" class="form-control" id="editManufacturer{{$value->id}}" name="Manufacturer" value="{{$value->Manufacturer}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editVehicleModel{{$value->id}}" class="form-label">Vehicle Model</label>
                                        <input type="text" class="form-control" id="editVehicleModel{{$value->id}}" name="VehicleModel" value="{{$value->Vehicle_Model}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editMfgVehicle{{$value->id}}" class="form-label">Mfg+Vehicle</label>
                                        <input type="text" class="form-control" id="editMfgVehicle{{$value->id}}" name="Mfg+Vehicle" value="{{$value->Mfg}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editAlgnRate{{$value->id}}" class="form-label">Alignment Rate</label>
                                        <input type="text" class="form-control" id="editAlgnRate{{$value->id}}" name="algnRate" value="{{$value->rate}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="modal fade" id="fullscreenModalexcel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excel Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/admin/upload/alignment" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputNumber" class=" col-form-label">Upload</label>
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