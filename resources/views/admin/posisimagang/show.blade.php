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
{{-- GAMBAR PROFIL --}}
{{-- <div class="rounded mx-auto d-block text-center mt-5 ">
    @if ( Auth::guard('admin')->user()->foto_perusahaan == null)
    <img src="{{url('/profil_perusahaan/perusahaan.jpg')}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
    @else
    <img src="{{asset('storage/' . Auth::guard('perusahaan')->user()->foto_perusahaan )}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
    @endif
    
</div> --}}
<div class="container-md mt-5 ">
    <div class="card justify-content-center mb-3">
        <div class="shadow p-3   bg-body rounded "><h5>Detail Posisi Magang {{ $posisi->nama_posisi }}</h5></div>
    </div>
    <div class="card mb-4 shadow p-3 mb-5  rounded"  >
        <div class="card-body">
            <div class="rounded mx-auto d-block text-center mt-5 ">
                <img src="{{url($posisi->foto_posisi)}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Deadline </h6>
                </div>
                <div class="col fs-6">
                    {{ $posisi->deadline_posisi }}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Persyaratan </h6>
                </div>
                <div class="col fs-6">
                    {{ $posisi->persyaratan_posisi }}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Keterangan </h6>
                </div>
                <div class="col fs-6">{{ $posisi->keterangan_posisi }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Fasilitas</h6>
                </div>
                <div class="col fs-6">{{ $posisi->fasilitas_posisi }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Deskripsi</h6>
                </div>
                <div class="col fs-6">{{ $posisi->deskripsi_posisi }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Perusahaan</h6>
                </div>
                <div class="col fs-6">
                    <a href="/admin/perusahaan/detail{{ $perusahaan->id }}" style="text-decoration:none">{{ $perusahaan->nama_perusahaan }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="mb-5">
        <a href="/admin/profiladmin/edit" class="btn btn-primary ">Edit</a>
        <form action="/logoutadmin" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-danger ">Log Out</button>
        
    </form>
    </div> --}}
</div>

    
    {{-- <h4>{{ Auth::guard('admin')->user() }}</h4> --}}
    @endsection