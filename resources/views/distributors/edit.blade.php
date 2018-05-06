@extends('layouts.lte')

@section('content')
<section class="content-header">
    <h1>
        Distributor Management
    </h1>
</section>

<section class="content">
    @include('layouts.alert')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Distributor</h3>
        </div>
        <form action="{{ route('distributors.update', $distributor->id) }}" class="form-horizontal" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama Distributor</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" value="{{ $distributor->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Alamat Email</label>
                    <div class="col-md-10">
                        <input type="email" name="email" class="form-control" value="{{ $distributor->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-md-10">
                        <input type="text" name="phone" class="form-control" value="{{ $distributor->phone }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kota</label>
                    <div class="col-md-10">
                        <input type="text" name="city" class="form-control" value="{{ $distributor->city }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status</label>
                    <div class="col-md-10">
                        <input type="text" name="status" class="form-control" value="{{ $distributor->status }}">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-success btn-sm pull-right margin" type="submit"><i class="fa fa-check"></i> Simpan</button>
                <button class="btn btn-warning btn-sm pull-right margin" type="reset"><i class="fa fa-refresh"></i> Reset</button>
            </div>
        </form>
    </div>
</section>
@endsection