@extends('approval.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalNew"><i class="fa fa-plus"></i> New Data</button> --}}
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
                                        <form action="/approval/barang/approve/{{$item->id}}" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-primary" value="Approve">
                                        </form>
                                        <br>
                                        <form action="/approval/barang/reject/{{$item->id}}" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="Reject">
                                        </form>    
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

@endsection