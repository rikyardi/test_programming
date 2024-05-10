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
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
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
                                    <td>{{$item->category}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <img src="{{ asset('images/') }}/{{$item->image}}" style="width:100px;height:100px;">
                                    </td>
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
                <form action="/admin/barang/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="InputBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="InputBarang" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputKategori" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori" required>
                            <option selected>Open this select menu</option>
                            @foreach ($kategori as $k)
                                <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-control m-3" type="file" id="formFile" name="image" required>
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



{{-- @foreach ($data as $item)
<div class="modal fade" id="modalEdit{{$item->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Data </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/item/update/{{$item->id}}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="InputBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="InputBarang" name="nama" value="{{$item->nama_barang}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputKategori" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori" required>
                            <option selected>Open this select menu</option>
                            @foreach ($kategori as $row)
                                <option value="{{$row->id}}">{{$row->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="InputSupplier" class="form-label">Supplier</label>
                        <select class="form-select" aria-label="Default select example" name="supplier" required>
                            <option selected>Open this select menu</option>
                            @foreach ($supplier as $sup)
                                <option value="{{$sup->id}}">{{$sup->nama_supplier}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{$item->harga}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{$item->stok}}" required>
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
@endforeach --}}


@endsection