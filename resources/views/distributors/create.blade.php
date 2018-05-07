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
        <form action="{{ route('distributors.store') }}" class="form-horizontal" method="POST">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama Distributor</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Alamat Email</label>
                    <div class="col-md-10">
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-md-10">
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kota</label>
                    <div class="col-md-10">
                        <input type="text" name="city" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status</label>
                    <div class="col-md-10">
                        <select class="form-control" name="status" id="">
                            <option value="1">Aktif</option>
                            <option value="0">Non Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-success btn-sm pull-right" type="submit"><i class="fa fa-check"></i> Simpan</button>
            </div>
        </form>
    </div>
</section>
@endsection