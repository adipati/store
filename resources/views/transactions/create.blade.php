@extends('layouts.lte')

@section('content')
<section class="content-header">
    <h1>Transaksi Management</h1>
</section>

<section class="content">
    @include('layouts.alert')
    
    <div class="box">
        <form action="{{ route('transactions.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Transaksi</h3>
            </div>
            <form class="form" action="">
                <div class="box-body">
                    <div class="col-md-6">
                        <label for="">Transaksi oleh:</label>
                        <div class="form-group">
                            <select name="distributor" class="form-control select2">
                                @foreach ($distributors as $distributor)
                                    <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="date" class="form-control datepicker">
                        </div>
                        <button class="btn btn-sm btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                    <div class="form-field col-md-6">
                        <label for="">Pembelian Item</label>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select name="product[]" class="product form-control select2">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input name="price[]" disabled class="form-control">
                                </div>                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input name="quantity[]" type="number" class="form-control">
                                </div>                                
                            </div>
                            <div class="col-md-1">
                                <button type="button" id="add-field" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
    
                </div>
            </form>
        </form>
    </div>
</section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Date picker
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            })

            $('#add-field').click(function() {
                $('.form-field').append('<div class="row field">'
                            +'<div class="col-md-5">'
                                +'<div class="form-group">'
                                    +'<select name="product[]" class="product form-control select2">'
                                        +'@foreach ($products as $product)'
                                            +'<option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>'
                                        +'@endforeach'
                                    +'</select>'
                                +'</div>'
                            +'</div>'
                            +'<div class="col-md-3">'
                                +'<div class="form-group">'
                                    +'<input name="price[]" disabled class="form-control">'
                                +'</div>'
                            +'</div>'
                            +'<div class="col-md-3">'
                                +'<div class="form-group">'
                                    +'<input name="quantity[]" type="number" class="form-control">'
                                +'</div>'
                            +'</div>'
                            +'<div class="col-md-1">'
                                +'<button type="button" class="remove btn btn-sm btn-danger"><i class="fa fa-close"></i></button>'
                            +'</div>'
                        +'</div>')
            })

            $('.content').on('click', '.remove', function() {
                $(this).closest('.row.field').remove()
            })

            $('.product').change(function(){
                var harga = $('.product option:selected').data('price');
                $('input[name=price]').val(harga);
            }).change()
            
        })
    </script>
@endsection