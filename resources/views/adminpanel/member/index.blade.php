@extends('templates.adminpanel.main-layout')

@section('title')
    Members
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#memberModal"> <i class="fas fa-plus"></i> Member</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email Address</th>
                        <th>Nama Member</th>
                        <th>Tgl Gabung</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($members as $member)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ date('d/m/Y, H:i:s', strtotime($member->created_at)) }}</td>
                            <td>
                                @if($member->status == 'active')
                                  <small class="badge  badge-success">Aktif</small>
                                @else
                                    <small class="badge  badge-danger">Tidak Aktif</small>
                                @endif

                            </td>
                            <td class="d-flex">
{{--                                Enable or Disable member--}}
                                <form action="{{ route('member.controls') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="memberId" value="{{ $member->id }}">
                                    <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Aktif/Nonaktifkan member" onclick="return confirm('Anda yakin?')"><i class="fas fa-info-circle"></i></button>
                                </form>
{{--                                Edit button--}}
                                <button type="button" class="btn btn-sm btn-warning mx-2" data-toggle="modal" data-target="#editModal{{ $member->id }}">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Member #{{ $member->id }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('member.update-by-id') }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="memberId" value="{{ $member->id }}">
                                                    <div class="form-group row">
                                                        <label for="etEmail"  class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" name="etEmail" id="etEmail" class="form-control" value="{{ $member->email }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="etName" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="etName" id="etName" class="form-control" value="{{ $member->name }}" required>
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
{{--                                Form for destroy--}}
                                <form action="{{ route('member.destroy-by-id') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="memberId" value="{{ $member->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus member" onclick="return confirm('Anda yakin menghapus member ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Member Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Member Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('member.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="etEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="etEmail" id="etEmail" class="form-control" placeholder="Email Member" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="etName" class="col-sm-2 col-form-label">Nama </label>
                        <div class="col-sm-10">
                            <input type="text" id="etName" name="etName" class="form-control" placeholder="Nama Member" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="etPass" class="col-sm-2 col-form-label">Password </label>
                        <div class="col-sm-10">
                            <input type="password" id="etPass" name="etPass" class="form-control" placeholder="Password Member" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
