@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            @include('layouts.alert')
            <div class="card">
                <div class="card-header">Produk</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a href="{{ route('distributors.create') }}">
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('products.search') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group md-3">
                                    <input name="search" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br><br>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SKU</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $numb => $product)
                                <tr>
                                    <td>{{ $numb+1 }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $product->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $product->id }}"><i class="fa fa-trash"></i></button>
                                        {{-- Modal Edit  --}}
                                        <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus produk {{ $product->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PUT">
                                                        
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">SKU</label>
                                                                <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Nama Produk</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Harga</label>
                                                                <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Deskripsi</label>
                                                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{-- Model Hapus --}}
                                        <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus produk {{ $product->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">                                                        
                                                       
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                            <button class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
    
                                @endforeach
                            </tbody>
                        </table>
                        
                        @if (count($products) < 1)
                            <div class="alert alert-warning" role="alert">
                                Data tidak ditemukan.
                            </div>
                        @endif

                        <div class="mx-auto">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
