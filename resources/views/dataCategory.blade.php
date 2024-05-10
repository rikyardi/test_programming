@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalNew"><i class="fa fa-plus"></i> New Data</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration text-center mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit{{$item->id}}"><i class="fa fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

{{-- Modal --}}
<div class="modal fade" id="modalNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/category/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="InputCategory" class="form-label">Nama Category</label>
                        <input type="text" class="form-control" id="InputCategory" name="name" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>



@foreach ($data as $item)
<div class="modal fade" id="modalEdit{{$item->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Data </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/category/update/{{$item->id}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="InputCategory" class="form-label">Nama Category</label>
                    <input type="text" class="form-control" id="InputCategory" name="name" value="{{$item->name}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@foreach ($data as $item)
<div class="modal fade" id="modalDelete{{$item->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this data?
                <p>{{$item->name}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                <a href="/pengguna/category/destroy/{{$item->id}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection