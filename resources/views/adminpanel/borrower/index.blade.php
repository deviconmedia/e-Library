@extends('templates.adminpanel.main-layout')

@section('title')
    Data Peminjam
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Data Baru
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('borrower.new') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="memberId" class="col-sm-3 col-form-label">Member</label>
                            <div class="col-sm-9">
                                <select name="memberId" id="memberId" class="form-control select2" required>
                                    <option value="" selected>--Pilih Member--</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bookId" class="col-sm-3 col-form-label">Buku</label>
                            <div class="col-sm-9">
                                <select name="bookId" id="bookId" class="form-control select2" required>
                                    <option value="" selected>--Pilih Buku--</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title . " - " . $book->author }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bookQty" class="col-sm-3 col-form-label">Jumlah Buku</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="bookQty" id="bookQty" min="1" max="10" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateBorrow" class="col-sm-3 col-form-label">Tgl Peminjaman</label>
                            <div class="col-sm-9">
                                <input type="date" name="dateBorrrow" id="dateBorrrow" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateReturn" class="col-sm-3 col-form-label">Tgl Pengembalian</label>
                            <div class="col-sm-9">
                                <input type="date" name="dateReturn" id="dateReturn" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan (Opsional)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
