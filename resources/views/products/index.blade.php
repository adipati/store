@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            @include('layouts.alert')
            <div class="card">
                <div class="card-header">Dashboard

                    <!-- Modal Edit -->
                    <div class="modal fade" id="add-product" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                
                                <form action="{{ route('products.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-product"><i class="fa fa-plus"></i> Tambah Produk</button>
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
