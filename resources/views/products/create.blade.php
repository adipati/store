@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu')

            <div class="col-md-8">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">
                        Tambah Produk
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="">Nomor SKU</label>
                                <input type="text" name="sku" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection