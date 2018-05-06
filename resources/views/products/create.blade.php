@extends('layouts.lte')

@section('content')
<section class="content-header">
    <h1>
        Product Management
    </h1>
</section>

<section class="content">
    @include('layouts.alert')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Product</h3>
        </div>
        <form action="{{ route('distributors.store') }}" class="form-horizontal" method="POST">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">SKU</label>
                    <div class="col-md-10">
                        <input type="text" name="sku" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama Produk</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Harga</label>
                    <div class="col-md-10">
                        <input type="text" name="price" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-md-10">
                        <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
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