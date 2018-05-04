@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah Distributor
                    </div>
                    <div class="card-body">
                        <form action="{{ route('distributors.store') }}" method="POST">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No. Telepon</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Kota</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Point</label>
                                <input type="number" name="point" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                                             
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                  First radio
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                  Second radio
                                </label>
                              </div>

                            
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection