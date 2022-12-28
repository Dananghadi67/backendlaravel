@extends('layouts.client_master')
@section('title', 'Edit Data Agama')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card card-info">
            @foreach ($agama as $item)
            <form action="{{url('/client/admin30/data-agama30/update30')}}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group row">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="agama" id="agama"
                                placeholder="Masukkan nama agama" value={{$item['nama_agama']}}>
                        </div>
                    </div>
                    <input type="hidden" name="id" value={{$item['id']}}>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                    <button onclick="history.back()" class="btn btn-default float-right">Cancel</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection