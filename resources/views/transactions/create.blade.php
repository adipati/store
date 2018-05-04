@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            @include('layouts.alert')
            <div class="card">
                <div class="card-header">Tambah Transaksi</div>

                <form action="{{ route('transactions.store') }}" method="POST">
                    <div class="card-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pilih Distributor</label>
                                    <select name="distributor" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach ($distributors as $distributor)
                                            <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="price">
                                <div class="form-group">
                                    <label for="">Pilih Tanggal</label>
                                    <div class="input-group datepicker">
                                            <input type="text" class="form-control" id="date" placeholder="MM/DD/YYYY">
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pilih Product</label>
                                    <select name="product" id="product" class="form-control select2">
                                        <option value=""></option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-harga="{{ $product->price }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="price">
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input name="quantity" type="number" class="form-control">
                                </div>                                
                                <button class="btn btn-block btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.select2').select2();
            
            $('#product').change(function(){
                var harga = $('#product option:selected').data('harga');
                $('input[name=price]').val(harga);
            }).change();

            $('#date').datepicker();
        });
    </script>
@endsection
