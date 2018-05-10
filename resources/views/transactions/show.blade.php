@extends('layouts.lte')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-solid">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">Detail Transaksi</h4>
                    <table class="table table-hover">
                        <tr>
                            <td>ID Transaksi</td>
                            <td>:</td>
                            <td><strong>{{ $transaction->id }}</strong></td>
                        </tr>
                        <tr>
                            <td>Nama Distributor</td>
                            <td>:</td>
                            <td><strong>{{ $transaction->distributor->name }}</strong></td>
                        </tr>
                        <tr>
                            <td>Tanggal Transaksi</td>
                            <td>:</td>
                            <td><strong>{{ $transaction->date }}</strong></td>
                        </tr>
                    </table>
                    <br><br>

                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">Pembelian Item</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->orders as $order)
                            <tr>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->price* $order->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection