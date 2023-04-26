@extends('templates.adminpanel.main-layout')

@section('title')
    Buku
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('book.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Buku</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Tgl Ditambahkan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($books as $b)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><a href="{{ url('book/show', $b->id) }}" data-toggle="tooltip" data-placement="bottom" title="Klik untuk melihat detail">{{ $b->isbn }}</a></td>
                            <td>{{ $b->title }}</td>
                            <td>{{ $b->category->category_name }}</td>
                            <td>{{ $b->publisher->publisher_name }}</td>
                            <td>{{ $b->author }}</td>
                            <td>{{ $b->year }}</td>
                            <td>{{ $b->stock }}</td>
                            <td>{{ date('d/m/Y, H:i:s', strtotime($b->created_at)) }}</td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection