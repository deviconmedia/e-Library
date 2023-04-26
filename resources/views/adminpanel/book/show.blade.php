@extends('templates.adminpanel.main-layout')

@section('title')
    Detail Buku
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('book.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Kembali ke List</a>
                        <div class="float-right d-flex">
                            <a href="{{ url('book/edit', $book->id) }}" class="btn btn-sm btn-warning mx-2"><i class="fas fa-edit"></i></a>
                            {{-- Form Delete Book --}}
                            <form action="{{ route('book.delete-by-id') }}" method="POST">
                                @csrf
                                <input type="hidden" name="bookId" value="{{ $book->id }}">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus buku ini?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('uploads/' . $book->sampul) }}" alt="" class="img-fluid">
                                {{-- Form sampul change --}}
                                <form action="{{ route('book.update-sampul') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="bookId" value="{{ $book->id }}">
                                    <div class="form-group row my-2">
                                        <label for="etSampul" class="col-sm-4 col-form-label">Ganti Sampul</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="etSampul" id="etSampul" class="form-control @error('etSampul') is-invalid @enderror">
                                            <small class="text-danger">Kosongkan jika tidak ingin mengubah sampul!</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-cloud-upload-alt"></i> Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>ISBN</th>
                                        <td>{{ $book->isbn }}</td>
                                    </tr>
                                    <tr>
                                        <th>Judul</th>
                                        <td>{{ $book->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>{{ $book->category->category_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penerbit</th>
                                        <td>{{ $book->publisher->publisher_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penulis</th>
                                        <td>{{ $book->author }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun</th>
                                        <td>{{ $book->year }}</td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <td>{{ $book->stock }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tgl Ditambahkan</th>
                                        <td>{{ date('d/m/Y, H:i:s', strtotime($book->created_at)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection