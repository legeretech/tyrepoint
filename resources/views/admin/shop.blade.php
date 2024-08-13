@extends('admin.layout')
@section('admin-body')
<section class="section">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body bg-100 bg-light">
                    <h5 class="card-title">Shop Details</h5>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalDialog"> Add Data
                        </button>
                    </div>
                    <div class="datatable-wrapper datatable-loading no-footer fixed-columns">
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Shop Name</th>
                                        <th>Email</th>
                                        <th>GST NO</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach($shop as $value)
                                    <tr data-index="0">
                                        <td>{{$i}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>
                                            <a href="#editModal{{$value->id}}" class="btn" data-bs-toggle="modal"><i class="ri-edit-2-fill"></i></a>
                                            <a href="/admin/delete/shop/{{$value->id}}" class="btn">
                                                <i class="ri-delete-bin-4-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section> 
<div class="modal fade" id="modalDialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Shop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/shop_action" method="post">
                                    @csrf
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modals Section -->
@foreach($shop as $value)
<div class="modal fade" id="editModal{{$value->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/edit/shop/{{$value->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$value->id}}">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editShop{{$value->id}}" class="form-label">Shop Name</label>
                                        <input type="text" class="form-control" id="name{{$value->id}}" name="name" value="{{$value->name}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editemail{{$value->id}}" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email{{$value->id}}" name="email" value="{{$value->email}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editemail{{$value->id}}" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email{{$value->id}}" name="email" value="{{$value->email}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
