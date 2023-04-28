@extends('templates.adminpanel.main-layout')

@section('title')
    Riwayat Peminjaman
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Data Riwayat Peminjaman Buku
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Buku</th>
                            <th>Jumlah</th>
                            <th>Tgl Peminjaman</th>
                            <th>Tgl Pengembalian</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                     @foreach($bData as $h)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $h->book->title }}</td>
                            <td>{{ $h->book_qty }}</td>
                            <td>{{ date('d M Y', strtotime($h->borrow_date)) }}</td>
                            <td>{{ date('d M Y', strtotime($h->date_return)) }}</td>
                            <td>
                                @if($h->return_status == 'Belum Dikembalikan')
                                    <small class="badge badge-danger">{{ $h->return_status }}</small>
                                @else
                                    <small class="badge badge-success">{{ $h->return_status }}</small>
                                @endif
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
