@extends('admin.layout')
@section('admin-body')
<section class="section">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body bg-100 bg-light">
                    <h5 class="card-title">Sub Categories</h5>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalDialog"> Add Data
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
                    <div class="datatable-wrapper datatable-loading no-footer fixed-columns">
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Type or Value</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach($subcategory as $value)
                                    <tr data-index="0">
                                        <td>{{$i}}</td>
                                        <td>{{$value->category_name}}</td>
                                        <td>{{$value->subcategory}}</td>
                                        <td>{{$value->type_or_value}}</td>
                                        <td>{{$value->price}}</td>
                                        <td>
                                            <a href="#editModal{{$value->id}}" class="btn" data-bs-toggle="modal"><i class="ri-edit-2-fill"></i></a>
                                            <a href="/admin/delete/subcategory/{{$value->id}}" class="btn">
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
<div class="modal fade" id="modalDialog" tabindex="-1" aria-labelledby="modalDialogLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/subcategory_action" method="post">
                                    @csrf
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Code</label>
                                        <select class="form-control" name="category">
                                            <option value=""  disabled>Select category</option>
                                            @foreach ($category as $value)
                                            <option value="{{$value->id}}">{{$value->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Sub Category</label>
                                        <input type="text" class="form-control" name="subcategory" placeholder="">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Type Or Value</label>
                                        <input type="text" class="form-control" name="type_or_value" placeholder="">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="price" placeholder="">
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
@foreach($subcategory as $value)
<div class="modal fade" id="editModal{{$value->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/edit/subcategory/{{$value->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$value->id}}">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editCategory{{$value->id}}" class="form-label">Category</label>
                                        <select class="form-control" name="category">
                                            @foreach ($category as $cat)
                                            <option value="{{$cat->id}}" @if($cat->id == $value->category_id) selected @endif>{{$cat->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editSubCategory{{$value->id}}" class="form-label">Sub Category</label>
                                        <input type="text" class="form-control" id="editSubCategory{{$value->id}}" name="subcategory" value="{{$value->subcategory}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editTypeOrValue{{$value->id}}" class="form-label">Type Or Value</label>
                                        <input type="text" class="form-control" id="editTypeOrValue{{$value->id}}" name="type_or_value" value="{{$value->type_or_value}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editPrice{{$value->id}}" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="editPrice{{$value->id}}" name="price" value="{{$value->price}}">
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
