@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            @include('layouts.alert')
            <div class="card">
                <div class="card-header">Transaksi</div>

                <div class="card-body">                  
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Transaksi</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Distributor</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $numb => $transaction)
                                <tr>
                                    <td>{{ $numb+1 }}</td>
                                    <td>{{ $transaction->distributor->name }}</td>
                                    <td>{{ $transaction->product->name }}</td>
                                    <td>{{ $transaction->price }}</td>
                                    <td>{{ $transaction->quantity }}</td>
                                    <td>{{ $transaction->date }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $transaction->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $transaction->id }}"><i class="fa fa-trash"></i></button>
                                        {{-- Modal Edit  --}}
                                        <div class="modal fade" id="edit{{ $transaction->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus produk {{ $transaction->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PUT">
                                                        
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">SKU</label>
                                                                <input type="text" name="sku" class="form-control" value="{{ $transaction->sku }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Nama Produk</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $transaction->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Harga</label>
                                                                <input type="text" name="price" class="form-control" value="{{ $transaction->price }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Deskripsi</label>
                                                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $transaction->description }}</textarea>
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
                                        <div class="modal fade" id="delete{{ $transaction->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus produk {{ $transaction->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
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
                        
                        @if (count($transactions) < 1)
                            <div class="alert alert-warning" role="alert">
                                Data tidak ditemukan.
                            </div>
                        @endif

                        <div class="mx-auto">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
