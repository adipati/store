@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            @include('layouts.alert')
            <div class="card">
                <div class="card-header">Distributor</div>

                <div class="card-body">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-distributor"><i class="fa fa-plus"></i> Tambah Distributor</button>
                    <br><br>
                    <!-- Modal Tambah Dsitributor -->
                    <div class="modal fade" id="add-distributor" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Distributor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                
                                <form action="{{ route('distributors.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Kota</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($distributors as $numb => $distributor)
                                <tr>
                                    <td>{{ $numb+1 }}</td>
                                    <td>{{ $distributor->name }}</td>
                                    <td>{{ $distributor->email }}</td>
                                    <td>{{ $distributor->phone }}</td>
                                    <td>{{ $distributor->city }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $distributor->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $distributor->id }}"><i class="fa fa-trash"></i></button>
                                         {{-- Modal Edit  --}}
                                        <div class="modal fade" id="edit{{ $distributor->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update distributor {{ $distributor->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('distributors.update', $distributor->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PUT">
                                                        
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Nama</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $distributor->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <input type="email" name="email" class="form-control" value="{{ $distributor->email }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">No. Telepon</label>
                                                                <input type="text" name="phone" class="form-control" value="{{ $distributor->phone }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Kota</label>
                                                                <input type="text" name="city" class="form-control" value="{{ $distributor->city }}">
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
                                        <div class="modal fade" id="delete{{ $distributor->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus distributor {{ $distributor->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('distributors.destroy', $distributor->id) }}" method="POST">
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
                        
                        <div class="mx-auto">
                            {{ $distributors->links() }}
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
