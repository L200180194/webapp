@extends('dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Pendaftar || {{ $daftar->name }}
    </h1>
</div>
<div class="rounded mx-auto d-block text-center mt-5 mb-3 ">
    <img src="{{$daftar->foto_user}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>Nama</h6>
    </div>
    <div class="col fs-6">{{$daftar->name}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>Alamat</h6>
    </div>
    <div class="col fs-6">{{$daftar->alamat_user}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>email</h6>
    </div>
    <div class="col fs-6">{{$daftar->email}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>No. Tlp</h6>
    </div>
    <div class="col fs-6">{{$daftar->notlp_user}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>Kota</h6>
    </div>
    <div class="col fs-6">{{$daftar->kota_id}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>Pendidikan</h6>
    </div>
    <div class="col fs-6">{{$daftar->pendidikan_id}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>Program Studi</h6>
    </div>
    <div class="col fs-6">{{$daftar->prodi_id}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>Skill</h6>
    </div>
    <div class="col fs-6">{{$daftar->skill_id}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>CV</h6>
    </div>
    <div class="col fs-6">{{$daftar->cv_user}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>Tanggal daftar</h6>
    </div>
    <div class="col fs-6">{{$pivot->tgl_daftar}}</div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <h6>Status Daftar</h6>
    </div>
    <div class="col fs-6">
        @if ($pivot->status_daftar == 'proses' )
        <div class="col fs-6"><span class="badge bg-warning text-dark">Proses</span></div>

        @elseif ($pivot->status_daftar == 'Diterima')
        <div class="col fs-6"><span class="badge bg-success">Diterima</span></div>

        @elseif ($pivot->status_daftar == 'Ditolak')
        <div class="col fs-6"><span class="badge bg-danger">Ditolak</span></div>

        @endif
    </div>
</div>

<div>{{ $daftar }}</div>

<h1>Pembatas</h1>
<div>{{ $pivot }}</div>

@endsection