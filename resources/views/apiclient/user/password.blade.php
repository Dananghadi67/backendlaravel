@extends('layouts.user_master')
@section('title', 'Ganti Password')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/dashboard30/update-password30">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="New password"
                                name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_confirmation"
                                placeholder="New password confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                    <button onclick="history.back()" class="btn btn-default float-right">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection