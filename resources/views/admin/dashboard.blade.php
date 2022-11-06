@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Admin Profile
                </h3>
            </div>
            <div class="card-body row">
                <div class="col-md-2">
                    <img width="100%" src="/profil/{{Auth::user()->foto}}" alt="">
                </div>
                <div class="col-md-4">
                    <form action="/admin30/dashboard30/update-foto-profil30" method="POST" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profil" accept="image/jpeg" name="profil">
                            <label class="custom-file-label" for="profil">Pilih Foto</label>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-info">Ganti Foto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Foto Profil</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Register Datetime</th>
                            <th>Status Aktif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td><img style="width: 10rem" src="/profil/{{$item->foto}}" alt=""></td>
                            <td>{{$item->name}} </td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->created_at}}</td>
                            <td class="text-center">
                                @if ($item->is_aktif=='1')
                                <span class="badge bg-success">Aktif</span>
                                @else
                                <span class="badge bg-warning">Belum Aktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href={{"/admin30/dashboard30/detail30/".Crypt::encrypt($item->id)}} class="btn
                                    btn-primary mx-1"><i class="fa fa-info-circle"></i> Detail</a>
                                @if ($item->is_aktif=='0')
                                <a href={{"/admin30/approve30/".Crypt::encrypt($item->id)}} class="btn btn-success
                                    mx-1"><i class="fa fa-user-check"></i> Approve
                                    User</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection