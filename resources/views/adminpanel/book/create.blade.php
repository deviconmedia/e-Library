@extends('templates.adminpanel.main-layout')

@section('title')
    Tambah Buku
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('book.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Kembali ke List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="etSampul" class="col-sm-2 col-form-label">Sampul</label>
                   <div class="col-sm-10">
                        <div class="custom-file mb-3">
                            <img class="img-preview img-fluid col-sm-2 my-3" ><br>
                            <input type="file" class="custom-file-input @error('etSampul') is-invalid @enderror" id="etSampul" name="etSampul" onchange="sampulPreview()">
                            <label class="custom-file-label" for="etSampul">Pilih file...</label>
                        </div>
                        @error('etSampul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                   </div>
                </div>
                <div class="form-group row">
                    <label for="etIsbn" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('etIsbn') is-invalid @enderror" id="etIsbn" name="etIsbn" placeholder="ISBN" autofocus>
                        @error('etIsbn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="etJudul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('etJudul') is-invalid @enderror" id="etJudul" name="etJudul" placeholder="Judul">
                        @error('etJudul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="etKategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 @error('etKategori') is-invalid @enderror" style="width: 100%;" id="etKategori" name="etKategori">
                            <option disabled selected hidden>Pilih</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                            @endforeach
                        </select>
                        @error('etKategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="etPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 @error('etPenerbit') is-invalid @enderror" style="width: 100%;" id="etPenerbit" name="etPenerbit">
                            <option disabled selected hidden>Pilih</option>
                            @foreach ($publishers as $p)
                                <option value="{{ $p->id }}">{{ $p->publisher_name }}</option>
                            @endforeach
                        </select>
                        @error('etPenerbit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="etPenulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('etPenulis') is-invalid @enderror" id="etPenulis" name="etPenulis" placeholder="Penulis">
                        @error('etPenulis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="etTahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('etTahun') is-invalid @enderror" id="etTahun" name="etTahun" placeholder="Tahun Terbit" value="{{ old('etTahun') }}">
                        @error('etTahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="etStok" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('etStok') is-invalid @enderror" id="etStok" name="etStok" placeholder="Jumlah Stok" value="{{ old('etStok') }}">
                        @error('etStok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="etKeterangan" class="col-sm-2 col-form-label">Keterangan (Opsional)</label>
                    <div class="col-sm-10">
                        <textarea name="etKeterangan" id="etKeterangan" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                </div>
                <div class="tombol float-right d-inline">
                    <a href="" class="btn btn-danger"><i class="fas fa-window-close"></i> Batal</a>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function sampulPreview() {
        const image = document.querySelector('#etSampul');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display ='block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
