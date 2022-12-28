@extends('layouts.user_master')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col 12">
        @if (Auth::user()->is_aktif == '0')
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Pemberitahuan!</h4>
            <p>Mohon maaf, akun anda belum di aktivasi oleh admin.</p>
            <hr>
            <p class="mb-0">Mohon menunggu atau silahkan hubungi admin jika penting.</p>
        </div>
        @else
        @foreach ($data as $item)
        @if ($item['alamat']==null||$item['tempat_lahir']==null||$item['tanggal_lahir']==null)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Pemberitahuan!</h4>
            <p>Selamat akun anda telah di aktivasi oleh admin.</p>
            <hr>
            <p class="mb-0">Untuk langkah selanjutnya silahkan update data diri anda pada link berikut, <a
                    href="{{url('/client/dashboard30/edit-data30')}}"><b>Update Data</b></a>.</p>
        </div>
        @else
        <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle mb-2" src="/profil/{{Auth::user()->foto}}"
                            alt="User profile picture">
                        <form action="{{url('/client/dashboard30/update-foto-profil30')}}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="profil" accept="image/jpeg"
                                    name="profil">
                                <label class="custom-file-label" for="profil">Pilih Foto</label>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-info">Ganti Foto</button>
                            </div>
                        </form>
                    </div>

                    <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Alamat</b> <a class="float-right">{{$item['alamat']}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tempat Lahir</b> <a class="float-right">{{$item['tempat_lahir']}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tanggal Lahir</b> <a class="float-right">{{$item['tanggal_lahir']}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Umur</b> <a class="float-right">{{$item['umur']}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Foto KTP</b> <a class="float-right"><img width="100%" src="/ktp/{{$item['foto_ktp']}}"
                                    alt=""></a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{url('/client/dashboard30/ganti-password30')}}"
                                class="btn btn-danger float-left"><i class="fa fa-tools"></i> Ganti password</a>
                            <a href="{{url('client/dashboard30/edit-data30')}}" class="btn btn-info float-right"><i
                                    class="fa fa-edit"></i> Edit
                                data</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        @endif
        @endforeach
        @endif
    </div>
</div>
@endsection