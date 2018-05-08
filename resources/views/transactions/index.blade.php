@extends('layouts.lte')

@section('content')
<section class="content-header">
    <h1>Transaksi</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Transaksi</h3>
            <div class="box-tools">
                <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Transaksi</a>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Distributor</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $numb => $transaction)
                        <tr>
                            <td>{{ $numb+1 }}</td>
                            <td>{{ $transaction->distributor->name }}</td>
                            <td>{{ $transaction->product->name }}</td>
                            <td>{{ $transaction->quantity }}</td>
                            <td>{{ $transaction->price }}</td>
                            <td>{{ $transaction->price*$transaction->quantity }}</td>
                            <td>{{ $transaction->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection