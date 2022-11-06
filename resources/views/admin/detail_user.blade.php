@extends('layouts.master')
@section('title', 'Detail User')
@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- Profile Image -->
        @foreach ($data as $item)
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                @foreach ($user as $user)
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle mb-2" src="/profil/{{$user->foto}}"
                        alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$user->name}}</h3>
                @endforeach

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Alamat</b> <a class="float-right">{{$item->alamat}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Tempat Lahir</b> <a class="float-right">{{$item->tempat_lahir}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Tanggal Lahir</b> <a class="float-right">{{$item->tanggal_lahir}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Umur</b> <a class="float-right">{{$item->umur}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Foto KTP</b> <a class="float-right"><img width="100%" src="/ktp/{{$item->foto_ktp}}"
                                alt=""></a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        @endforeach
        <!-- /.card -->
    </div>
</div>
@endsection