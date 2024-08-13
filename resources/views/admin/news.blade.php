@extends('admin.layout')
@section('admin-body')
<section class="section">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body bg-100 bg-light">
                    <h5 class="card-title">News</h5>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalDialog"> Add News
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
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Discription</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach($news as $value)
                                    <tr data-index="0">
                                        <td>{{$i}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->date}}</td>
                                        <td>{{$value->discription}}</td>
                                        <td><img src="/{{$value->image}}" alt="" width="100px" height="auto"></td>
                                        <td>
                                            <a href="#editModal{{$value->id}}" class="btn" data-bs-toggle="modal"><i class="ri-edit-2-fill"></i></a>
                                            <a href="/admin/delete/news/{{$value->id}}" class="btn">
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
                <h5 class="modal-title">Add News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/news_action" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Date</label>
                                        <input type="date" class="form-control" name="date" placeholder="">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" placeholder="">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="inputName5" class="form-label">Discription</label>
                                        <textarea class="form-control" name="discription" placeholder="">
                                            </textarea>
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
@foreach($news as $value)
<div class="modal fade" id="editModal{{$value->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="/admin/edit/news/{{$value->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editTitle{{$value->id}}" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="editTitle{{$value->id}}" name="title" value="{{$value->title}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="editdate{{$value->id}}" class="form-label">Date</label>
                                        <input type="text" class="form-control" id="editdate{{$value->id}}" name="date" value="{{$value->date}}">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="discription{{$value->id}}" class="form-label">Description</label>
                                        <textarea class="form-control" id="discription{{$value->id}}" name="discription">{{$value->discription}}</textarea>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <label for="Image{{$value->id}}" class="form-label">Image</label>
                                        <img src="/{{$value->image}}" alt="" width="100px" height="auto">
                                        <input type="file" class="form-control" id="image{{$value->id}}" name="image">
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