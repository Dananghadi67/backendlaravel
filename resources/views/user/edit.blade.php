@extends('layouts.user_master')
@section('title', 'Edit Data')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">{{Auth::user()->name}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/dashboard30/update-data30"
                enctype="multipart/form-data">
                @csrf
                @foreach ($data as $item)
                <div class="card-body">
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" placeholder="Alamat"
                                name="alamat">{{$item->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempat" placeholder="Tempat Lahir" name="tempat"
                                value={{$item->tempat_lahir}}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" placeholder="Tanggal Lahir"
                                name="tanggal" value={{$item->tanggal_lahir}}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="agama" id="agama">
                                @foreach ($agama as $agama)
                                <option value={{$agama->id}} @if ($agama->id==$item->id_agama) selected
                                    @endif>{{$agama->nama_agama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto KTP</label>
                        <div class="col-sm-10">
                            <div class="row mb-2">
                                <img src="/ktp/{{$item->foto_ktp}}" width="100%" alt="">
                            </div>
                            <div class="row">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ktp" accept="image/jpeg"
                                        name="ktp">
                                    <label class="custom-file-label" for="ktp">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                    <button onclick="history.back()" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection