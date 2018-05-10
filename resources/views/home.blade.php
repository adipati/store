@extends('layouts.lte')

@section('content')
<section class="content-header">
    <h1>Dashboard</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <a href="{{ route('distributors.index') }}">
                    <span class="info-box-icon bg-aqua">
                        <i class="ion ion-paper-airplane"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Distributor</span>
                        <span class="info-box-number">{{$distributors}}</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <a href="{{ route('products.index') }}">
                    <span class="info-box-icon bg-red">
                        <i class="ion ion-clipboard"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Produk</span>
                        <span class="info-box-number">{{$products}}</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <a href="{{ route('transactions.index') }}">
                    <span class="info-box-icon bg-orange">
                        <i class="ion ion-cart"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Transaksi</span>
                        <span class="info-box-number">{{$transactions}}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection