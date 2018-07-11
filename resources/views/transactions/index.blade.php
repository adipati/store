@extends('layouts.lte')

@section('content')
<section class="content-header">
    <h1>Transaction Management</h1>
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
                        <th>Tanggal Transaksi</th>
                        <th>Total Transaksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $numb => $transaction)
                    <? $total=0; ?>
                        <tr>
                            <td>{{ $numb+1 }}</td>
                            <td>{{ $transaction->distributor->name }}</td>
                            <td>{{ $transaction->date }}</td>
                            <td>
                                @foreach ($transaction->orders as $order)
                                    <? $total = $total + ($order->price*$order->quantity) ?>
                                @endforeach
                                Rp. {{ $total }}
                            </td>
                            <td>
                                    <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
