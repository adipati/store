@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            @include('layouts.alert')
            <div class="card">
                <div class="card-header">Tambah Transaksi</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pilih Distributor</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Distributor</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Distributor</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Distributor</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
