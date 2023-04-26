@extends('templates.web.main-layout')
@section('title')
    Daftar Buku
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-5">Daftar Buku</h1>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ISBN</th>
                        <th>JUDUL</th>
                        <th>PENULIS</th>
                        <th>TAHUN TERBIT</th>
                        <th>PENERBIT</th>
                    </tr>
                </thead>
                <tbody>
                  @php $no=1; @endphp
                  @foreach($books as $book)
                      <tr>
                          <th>{{ $no++ }}</th>
                          <td><a href="{{ route('web.buku-detail', $book->id) }}">{{ $book->isbn }}</a></td>
                          <td>{{ $book->title }}</td>
                          <td>{{ $book->author }}</td>
                          <td>{{ $book->year }}</td>
                          <td>{{ $book->publisher->publisher_name }}</td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection
