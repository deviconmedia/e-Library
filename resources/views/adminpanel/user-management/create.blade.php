@extends('templates.adminpanel.main-layout')

@section('title')
    Tambah User Baru
@endsection

@section('content')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user-management.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="etName" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" name="etName" id="etName" class="form-control @error('etName') is-invalid @enderror" placeholder="Masukan Nama User" value="{{ old('etName') }}">
                            @error('etName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="etEmail" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" id="etEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email Address" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="etLevel" class="col-sm-3 col-form-label">Level User</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control @error('etLevel') is-invalid @enderror" style="width: 100%;" name="etLevel" id="etLevel">
                                <option value="" selected>Pilih</option>
                                <option value="Admin">Admin</option>
                                <option value="Staff">Staff</option>
                            </select>
                            @error('etLevel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="etPass" class="col-sm-3 col-form-label">Kata Sandi</label>
                        <div class="col-sm-9">
                            <input type="password" name="etPass" id="etPass" class="form-control @error('etPass') is-invalid @enderror" placeholder="Masukan Kata Sandi">
                            @error('etPass')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="etPassConf" class="col-sm-3 col-form-label">Konfirmasi Kata Sandi</label>
                        <div class="col-sm-9">
                            <input type="password" name="etPassConf" id="etPassConf" class="form-control @error('etPassConf') is-invalid @enderror" placeholder="Konfirmasi Kata Sandi">
                            @error('etPassConf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('user-management.index') }}" class="btn btn-danger mx-2"><i class="fas fa-times"></i> Batal</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2()
        });
    </script>
@endsection
