@extends('templates.web.main-layout')

@section('title')
Detail Buku
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid mb-4" style="height: 110vh!important;">
    <div class="container">
        <h1 class="display-5">Detail Buku</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('uploads/' . $book->sampul) }}" alt="sampul" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>ISBN</th>
                                <td>{{ $book->isbn }}</td>
                            </tr>
                            <tr>
                                <th>JUDUL BUKU</th>
                                <td>{{ $book->title }}</td>
                            </tr>
                            <tr>
                                <th>KATEGORI</th>
                                <td>{{ $book->category->category_name }}</td>
                            </tr>
                            <tr>
                                <th>PENULIS</th>
                                <td>{{ $book->author }}</td>
                            </tr>
                            <tr>
                                <th>PENERBIT</th>
                                <td>{{ $book->publisher->publisher_name }}</td>
                            </tr>
                            <tr>
                                <th>TAHUN TERBIT</th>
                                <td>{{ $book->year }}</td>
                            </tr>
                            <tr>
                                <th>TGL DITAMBAHKAN</th>
                                <td>{{ date('d M Y, H:i:s', strtotime($book->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>KETERANGAN</th>
                                <td>{{ $book->information }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
