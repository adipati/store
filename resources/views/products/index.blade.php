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
            <h3 class="box-title">Daftar product</h3>
            <div class="box-tools">
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Produk</a>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
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
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $product->id }}" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>
                                {{-- Modal Edit  --}}
                            <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update product {{ $product->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        
                                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">
                                            
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Nama</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $product->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">No. Telepon</label>
                                                    <input type="text" name="phone" class="form-control" value="{{ $product->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Kota</label>
                                                    <input type="text" name="city" class="form-control" value="{{ $product->city }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                <button class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Hapus --}}
                            <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus product {{ $product->name }}</h5>
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
        </div>
        <div class="box-footer clear-fix">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection