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
<div class="card justify-content-center mt-5">
    <div class="shadow p-3  bg-body rounded "><h5>PROFIL PERUSAHAAN</h5></div>
</div>

<div class="card shadow p-3 mb-5 bg-body rounded mt-3">
    {{-- GAMBAR PROFIL --}}
    <div class="rounded mx-auto d-block text-center mt-5 ">
        @if ( $perusahaan->foto_perusahaan == null)
        <img src="{{url('/profil_perusahaan/perusahaan.jpg')}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
        @else
        <img src="{{asset('storage/' . $perusahaan->foto_perusahaan )}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
        @endif
        
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Nama </h6>
        </div>
        <div class="col fs-6">{{ $perusahaan->nama_perusahaan}} </div>
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Alamat </h6>
        </div>
        <div class="col fs-6">{{ $perusahaan->alamat_perusahaan }} </div>
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>No Telepon</h6>
        </div>
        <div class="col fs-6"> {{ $perusahaan->notlp_perusahaan }} </div>
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Email</h6>
        </div>
        <div class="col fs-6"> {{ $perusahaan->email }} </div>
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Deskripsi</h6>
        </div>
        <div class="col fs-6">
            @if ( $perusahaan->deskripsi_perusahaan == null)
            PROFIL BELUM LENGKAP
            @else
            {!!  $perusahaan->deskripsi_perusahaan !!}

            @endif
        </div>

    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Surat Perusahaan </h6>
        </div>
        <div class="col fs-6">
            @if ( $perusahaan->surat_perusahaan == null)
            PROFIL BELUM LENGKAP
            @else
            <embed  class="rounded" src="{{asset('storage/' . $perusahaan->surat_perusahaan )}}" type="application/pdf" width="600" height="600">
            @endif
        </div>

    </div>
</div>
    {{ $perusahaan }}
</div>
    {{-- <h4>{{ Auth::guard('admin')->user() }}</h4> --}}
    @endsection