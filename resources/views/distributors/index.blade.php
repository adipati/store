@extends('layouts.lte') 

@section('content')

<section class="content-header">
    <h1>
        Avostore Management
    </h1>
</section>

<section class="content">
    @include('layouts.alert')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Avostore</h3>
            <div class="box-tools">
                <a href="{{ route('distributors.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Avostore</a>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Avostore</th>
                        <th>Alamat Email</th>
                        <th>No. Telepon</th>
                        <th>Kota</th>
                        <th>Terakhir Transaksi</th>
                        <th>Status</th>
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
                        <td>{{ $distributor->last_transaction }}</td>
                        <td><span class="label {{ $distributor->status==1 ? 'label-success' : 'label-warning' }}">{{ $distributor->status==1 ? 'Aktif' : 'Non Aktif' }}</span></td>
                        <td>
                            <a href="{{ route('distributors.edit', $distributor->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $distributor->id }}" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>
                                {{-- Modal Edit  --}}
                            <div class="modal fade" id="edit{{ $distributor->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Avostore {{ $distributor->name }}</h5>
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
                                            <h5 class="modal-title">Hapus Avostore {{ $distributor->name }}</h5>
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
        </div>
        <div class="box-footer clear-fix">
            {{ $distributors->links() }}
        </div>
    </div>
</section>
@endsection