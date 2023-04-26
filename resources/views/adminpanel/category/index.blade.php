@extends('templates.adminpanel.main-layout')

@section('title')
    Kategori
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i> Kategori Baru
            </button>              
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Tgl Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($categories as $c)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $c->category_name }}</td>
                        <td>{{ date('d/m/Y, H:i:s', strtotime($c->created_at)) }}</td>
                        <td class="d-flex">
                            <a href="" class="btn btn-sm btn-warning mx-2" data-toggle="modal" data-target="#editModal{{ $c->id }}"><i class="fas fa-edit"></i></a>
                            {{-- edit modal --}}
                            <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Kategori #{{ $c->id }}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ route('book.update-category') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $c->id }}">
                                        <div class="form-group row">
                                            <label for="nama_kategori" class="col-sm-3 col-form-label">Nama Kategori</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="{{ $c->category_name }}">
                                            </div>
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
                            {{-- end edit modal --}}
                            <form action="{{ route('book.delete-category') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $c->id }}">
                                <button type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin untuk menghapus data ini?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kategori Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('book.new-category') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="nama_kategori" class="col-sm-3 col-form-label">Nama Kategori</label>
                <div class="col-sm-9">
                    <input type="text" id="nama_kategori" name="nama_kategori" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection