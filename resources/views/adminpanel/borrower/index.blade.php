@extends('templates.adminpanel.main-layout')

@section('title')
    Data Peminjam
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info mx-3" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Data Baru
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#returnModal">
                    <i class="fas fa-plus"></i> Data Pengembalian
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Member</th>
                            <th>Buku</th>
                            <th>Jumlah</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Pengembalian</th>
                            <th>Lama Peminjaman</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($borrowers as $b)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $b->member->name }}</td>
                                <td>{{ $b->book->title }}</td>
                                <td>{{ $b->book_qty }}</td>
                                <td>{{ date('d M Y', strtotime($b->borrow_date))}}</td>
                                <td>{{ date('d M Y', strtotime($b->date_return)) }}</td>
                                <td>
                                    @php
                                        $borrowDate = new DateTime($b->borrow_date);
                                        $returnDate = new DateTime($b->date_return);
                                        $diff = $borrowDate->diff($returnDate);
                                        echo $diff->days . " Hari";
                                    @endphp
                                </td>
                                <td>
                                    @if ($b->return_status == 'Dikembalikan')
                                        <span class="badge badge-success">{{ $b->return_status }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $b->return_status }}</span>
                                    @endif
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
                                <input type="date" name="dateBorrow" id="dateBorrow" class="form-control" required>
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

    <!-- Return Modal -->
<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel">Data Pengembalian Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('borrower.change-status') }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="borrowerId" class="col-sm-3 col-form-label">Data Peminjam</label>
                <div class="col-sm-9">
                    <select name="borrowerId" id="borrowerId" class="form-control select2">
                        <option value="" selected>--Pilih Data--</option>
                        @foreach ($data2 as $item)
                             <option value="{{ $item->id }}">{{ $item->member->name . " - " . $item->book->title . " (Tgl: " . date('d M Y', strtotime($item->borrow_date)) . " )" }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Tandai sebagai Diterima</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
