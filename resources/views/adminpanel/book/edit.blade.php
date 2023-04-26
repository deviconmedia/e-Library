@extends('templates.adminpanel.main-layout')

@section('title')
    Edit Buku
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('book/show', $book->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Detail</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book.update-by-id') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="bookId" value="{{ $book->id }}">
                            <div class="form-group row">
                                <label for="etIsbn" class="col-sm-2 col-form-label">ISBN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="etIsbn" name="etIsbn" value="{{ $book->isbn }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="etJudul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="etJudul" name="etJudul" value="{{ $book->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="etKategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="etKategori" id="etKategori">
                                        <option value="{{ $book->category_id }}" selected>{{ $book->category->category_name }}</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="etPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="etPenerbit" id="etPenerbit">
                                        <option value="{{ $book->publisher_id }}" selected>{{ $book->publisher->publisher_name }}</option>
                                        @foreach ($publishers as $p)
                                            <option value="{{ $p->id }}">{{ $p->publisher_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="etPenulis" class="col-sm-2 col-form-label">Penulis</label>
                                <div class="col-sm-10">
                                    <input type="text" name="etPenulis" id="etPenulis" class="form-control" value="{{ $book->author }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="etTahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                                <div class="col-sm-10">
                                    <input type="text" name="etTahun" id="etTahun" class="form-control" value="{{ $book->year }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="etStok" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="text" name="etStok" id="etStok" class="form-control" value="{{ $book->stock }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="etKeterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea name="etKeterangan" id="etKeterangan" cols="30" rows="3" class="form-control">{{ $book->information }}</textarea>
                                </div>
                            </div>
                            <div class="tombol float-right d-flex">
                                <a href="" class="btn btn-danger mx-2"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection