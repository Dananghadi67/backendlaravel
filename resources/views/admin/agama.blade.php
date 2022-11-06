@extends('layouts.master')
@section('title', 'Data Agama')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Agama</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Agama</th>
                            <th>Aksi</th>
                            <th><button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#tambah-agama"><i class=" fa fa-plus"></i> Tambah</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agama as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama_agama}}</td>
                            <td class="text-center">
                                <a href="/admin30/data-agama30/edit30/{{$item->id}}" class="text-success mx-2"><i
                                        class="fa fa-edit fa-lg"></i></a>
                                <a href="/admin30/data-agama30/delete30/{{$item->id}}" class="text-danger mx-2"><i
                                        class="fa fa-trash fa-lg"></i></a>
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="modal fade" id="tambah-agama">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/admin30/data-agama30/create30" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Agama</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="agama" id="agama"
                                        placeholder="Masukkan nama agama">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class=" fa fa-plus"></i> Add</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</div>
@endsection