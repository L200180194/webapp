@extends('admin.layoutsdashboard.main')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (session()->has('danger'))
<div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
    {{ session('danger') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
    @if ( Auth::guard('admin')->user()->level == 'superadmin')
    <div class="card justify-content-center mb-3 mt-4">
        <div class="shadow p-3   bg-body rounded "><h5>EDIT ADMIN</h5></div>
    </div>
    <div class="card mb-4 shadow p-3 mb-5  rounded"  >
        <div class="card-body">
            {{-- <h5 class="card-title">Profil Peruahaan</h5> --}}
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Nama </h6>
                </div>
                <div class="col fs-6">
                    {{ $admin->nama_admin }}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Alamat </h6>
                </div>
                <div class="col fs-6">{{ $admin->alamat_admin }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>No Telepon</h6>
                </div>
                <div class="col fs-6">{{ $admin->tlp_admin }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Email</h6>
                </div>
                <div class="col fs-6">{{ $admin->email }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>status</h6>
                </div>
                <div class="col fs-6">
                    {{ $admin->status }}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>level</h6>
                </div>
                <div class="col fs-6">
                    {{ $admin->level }}
                </div>
            </div>
        </div>
        <div class="row mt-2"> 
            <div class="col">
                {{-- MODAL UBAH STATUS --}}
                <!-- Button trigger modal -->
                <a href="/admin/admins" class="btn btn-warning text-white">Back</a>
                <button type="button" class="btn btn-primary mt-2 mb-2 mx-2" data-bs-toggle="modal" data-bs-target="#ubahstatus">
                    Edit
                </button>
                

                <!-- Modal -->
                <div class="modal fade" id="ubahstatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/admin/admins/{{ $admin->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="modal-body">
                                    <label for="status" class="form-label">Status Admin</label>
                                    <select class="form-select " name="status" id="status">
                                        @if ($admin->status == 'aktif')
                                            <option value="aktif"  selected>Aktif</option>
                                            <option value="berhenti">Berhenti</option>
                                        @elseif ($admin->status == 'berhenti')
                                            <option value="aktif" >Aktif</option>
                                            <option value="berhenti" selected>Berhenti</option>
                                        @endif
                                    </select>
                                    <label for="level" class="form-label mt-2">Level Admin</label>
                                    <select class="form-select" name="level" id="level">
                                        @if ($admin->level == 'superadmin')
                                            <option value="superadmin" selected>Superadmin</option>
                                            <option value="admin">Admin</option>
                                        @elseif ($admin->level == 'admin')
                                            <option value="superadmin" >Superadmin</option>
                                            <option value="admin" selected>Admin</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @else
        <div class="shadow p-3 mb-3 mt-4 bg-body rounded justify-content-center ">
            <h4 class="justify-content-center text-danger">AKSES DITOLAK</h4>
        </div>
    @endif
    
@endsection
{{-- <form method="POST" action="/dashboard/posisi/{{ $posisi->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="nama_posisi" class="form-label">Nama Posisi</label>
        <input type="text" class="form-control @error('nama_posisi') is-invalid @enderror" id="nama_posisi" name="nama_posisi" placeholder="Web Developer" required value="{{ old('nama_posisi',$posisi->nama_posisi) }}">
        @error('nama_posisi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="foto_posisi" class="form-label">Foto</label>
        
        @if ($posisi->foto_posisi)
            <img src="{{  asset('storage/' . $posisi->foto_posisi) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
        <img alt="" class="img-preview img-fluid mb-3 col-sm-5">
        @endif
        <input class="form-control @error('foto_posisi') is-invalid @enderror"  type="file" id="foto_posisi" name="foto_posisi"  onchange="previewImage()">
        @error('foto_posisi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="deadline_posisi" class="form-label">Deadline</label>
        <input type="date" class="form-control @error('deadline_posisi') is-invalid @enderror" id="deadline_posisi" name="deadline_posisi" required value="{{  old('deadline_posisi',$posisi->deadline_posisi) }}">
        @error('deadline_posisi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="persyaratan_posisi" class="form-label">Persyaratan </label>
        <input id="persyaratan_posisi" type="hidden" name="persyaratan_posisi" value="{{ old('persyaratan_posisi',$posisi->persyaratan_posisi) }}">
        <trix-editor input="persyaratan_posisi"></trix-editor>
        @error('persyaratan_posisi')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fasilitas_posisi" class="form-label">Fasilias </label>
        <input id="fasilitas_posisi" type="hidden" name="fasilitas_posisi" value="{{ old('$posisi->fasilitas_posisi',$posisi->fasilitas_posisi) }}">
        <trix-editor input="fasilitas_posisi"></trix-editor>
        @error('fasilitas_posisi')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="deskripsi_posisi" class="form-label">Deskripsi </label>
        <input id="deskripsi_posisi" type="hidden" name="deskripsi_posisi" value="{{ old('deskripsi_posisi',$posisi->deskripsi_posisi) }}">
        <trix-editor input="deskripsi_posisi"></trix-editor>
        @error('deskripsi_posisi')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="keterangan_posisi" class="form-label">Keterangan </label>
        <input id="keterangan_posisi" type="hidden" name="keterangan_posisi" value="{{ old('keterangan_posisi',$posisi->keterangan_posisi) }}">
        <trix-editor input="keterangan_posisi"></trix-editor>
        @error('keterangan_posisi')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input type="hidden" name="nama_file" id="nama_file" value="{{ $posisi->foto_posisi }}">
    </div>
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form> --}}