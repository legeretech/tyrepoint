@extends('admin.layout')
@section('admin-body')
<section class="section">
    <div class="row">
        <div class="12">
            <div class="card">
                <div class="card-body bg-100 bg-light">
                    <h5 class="card-title">Categories</h5>
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
                        <div width="50%">
                            <center>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Category</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                    @foreach($category as $value)
                                    <tr data-index="0">
                                        <td>{{$i}}</td>
                                        <td>{{$value->category}}</td>
                                        <!-- <td>
                                            <a href="#editModal{{$value->id}}" class="btn" data-bs-toggle="modal"><i class="ri-edit-2-fill"></i></a> -->
                                            <!-- <a href="/admin/delete/category/{{$value->id}}" class="btn">
                                                <i class="ri-delete-bin-4-fill"></i>
                                            </a> -->
                                        <!-- </td> -->
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            </center>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Modal Section -->
<div class="modal fade" id="modalDialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/category_action" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Category</label>
                                        <input type="text" class="form-control" name="category" placeholder="">
                                    </div>

                                    <div class="col-md-12">
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
@foreach($category as $value)
<div class="modal fade" id="editModal{{$value->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/edit/category/{{$value->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$value->id}}">
                                    <div class="col-md-12">
                                        <label for="editcategory{{$value->id}}" class="form-label">CAtegory</label>
                                        <input type="text" class="form-control" id="editcategory{{$value->id}}" name="category" value="{{$value->category}}">
                                    </div>
                                     <div class="col-md-12">
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