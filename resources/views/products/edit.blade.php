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
            <h3 class="box-title">Tambah Data Produk</h3>
        </div>
        <form action="{{ route('products.update', $product->id) }}" class="form-horizontal" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">SKU</label>
                    <div class="col-md-10">
                        <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama Produk</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Harga</label>
                    <div class="col-md-10">
                        <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-md-10">
                        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $product->description }}</textarea>
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