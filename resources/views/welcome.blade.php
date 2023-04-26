@extends('templates.web.main-layout')

@section('title')
    Sistem Perpustakaan
@endsection

@section('content')
<div class="content">
      {{-- Jumbotron --}}
      <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <img src="{{ asset('web/img/logo.png') }}" alt="" srcset="" width="200px">
          <h1 class="display-4">PERPUSTAKAAN SMANX</h1>
        </div>
      </div>
      {{-- End Jumbotron --}}
</div>
@endsection