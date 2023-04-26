@extends('templates.adminpanel.main-layout')

@section('title')
    Penerbit
@endsection

@section('content')
<div class="container">
    <div class="row">
        {{-- Col for Table --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Data Penerbit
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Penerbit</th>
                                <th>Tgl Ditambahkan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($publishers as $p)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $p->publisher_name }}</td>
                                    <td>{{ date('d/m/Y, H:i:s', strtotime($p->created_at)) }}</td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-sm btn-warning mx-1" data-toggle="modal" data-target="#editModal{{ $p->id }}"><i class="fas fa-edit"></i></a>
                                        {{-- Edit Modal --}}
                                        <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Edit Penerbit #{{ $p->id }}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="nama_penerbit">Nama Penerbit</label>
                                                            <input type="text" name="nama_penebit" id="nama_penerbit" class="form-control" value="{{ $p->publisher_name }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>                                          
                                        {{-- End Edit Modal --}}
                                        <form action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Col for form --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-secondary">Tambah Penerbit</div>
                <div class="card-body">
                   <form action="{{ route('book.new-publisher') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_penerbit">Nama Penerbit</label>
                            <input type="text" name="nama_penerbit" id="nama_penerbit" class="form-control" placeholder="Nama Penerbit">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection