@extends('templates.adminpanel.main-layout')

@section('title')
    User Management
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('user-management.new') }}" class="btn btn-info"><i class="fas fa-plus"></i> Pengguna Baru</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Login Terakhir</th>
                            <th>Status</th>
                            <th>Kata Sandi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($users as $user)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level }}</td>
                            <td>{{ date('d M Y, H:i:s', strtotime($user->last_logged)) }}</td>
                            <td>
                                @if($user->status == 'active')
                                    <small class="badge badge-success">{{ $user->status }}</small>
                                @else
                                    <small class="badge badge-danger">{{ $user->status }}</small>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="badge badge-secondary" data-toggle="modal" data-target="#passChangeModal{{ $user->id }}" data-placement="bottom" title="Ubah Kata Sandi">Ubah</a>
                                <!-- Modal -->
                                <div class="modal fade" id="passChangeModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user-management.pass-change') }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" name="userId" id="userId" value="{{ $user->id }}">
                                                    <div class="form-group row">
                                                        <label for="etNewPass" class="col-sm-4 col-form-label">Kata Sandi Baru</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" name="etNewPass" id="etNewPass" class="form-control" placeholder="Kata Sandi Baru">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="d-flex">
{{--                                Enable or Disable User--}}
                                <form action="{{ route('user-management.status-change') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Aktif/Nonaktifkan User"><i class="fas fa-info-circle"></i></button>
                                </form>
{{--                                User Delete--}}
                                <form action="{{ route('user-management.delete') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger mx-2" data-toggle="tooltip" data-placement="bottom" title="Hapus User" onclick="return confirm('Anda yakin menghapus pengguna ini?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
