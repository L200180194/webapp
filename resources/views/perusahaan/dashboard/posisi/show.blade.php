@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="card my-5 text-white" style="background-color: #50555D">
    <h5 class="card-header">{{ $posisi->nama_posisi }}</h5>
    <div class="card-body">
        <div class="row mb-4">
            <div class="rounded mx-auto d-block text-center mt-3 ">
                <img src="{{ asset('storage/' . $posisi->foto_posisi) }}" class="img-thumbnail img-fluid" alt="..." width="400px" height="40px">
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                <h5>Persyaratan </h5>
            </div>
            <div class="col fs-6">{!! $posisi->persyaratan_posisi !!}</div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                <h5>Keterangan </h5>
            </div>
            <div class="col fs-6">{!! $posisi->keterangan_posisi !!}</div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                <h5>Fasilitas </h5>
            </div>
            <div class="col fs-6">{!! $posisi->fasilitas_posisi !!}</div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                <h5>Deskripsi </h5>
            </div>
            <div class="col fs-6">{!! $posisi->deskripsi_posisi !!}</div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                <h5>Deadline </h5>
            </div>
            <div class="col fs-6">{!! $posisi->deadline_posisi !!}</div>
        
        </div>
      
    </div>
  </div>
{{-- <div class="container my-9 mb-5">
    <div class="row text-center mt-5">
        <h1>{{ $posisi->nama_posisi }}</h1>
    </div>
    <div class="row">
        <div class="rounded mx-auto d-block text-center mt-3 ">
            <img src="{{ asset('storage/' . $posisi->foto_posisi) }}" class="img-thumbnail img-fluid" alt="..." width="400px" height="40px">
        </div>
    </div>
    <div class="row-md mt-3">
        <h3>Persyaratan</h3>
        <div class="container fs-5">
            {!! $posisi->persyaratan_posisi !!}
        </div>
    </div>
    <div class="row-md mt-3">
        <h3>Keterangan</h3>
        <div class="container fs-5">
            {!! $posisi->keterangan_posisi !!}
        </div>
    </div>
    <div class="row-md mt-3">
        <h3>fasilitas</h3>
        <div class="container fs-5">
            {!! $posisi->fasilitas_posisi !!}
        </div>
    </div>
    <div class="row-md mt-3">
        <h3>Deskripsi</h3>
        <div class="container fs-5">
            {!! $posisi->deskripsi_posisi !!}
        </div>
    </div>
    <div class="row-md mt-3 ">
        <h3>Deadline</h3>
        <div class="container fs-5">
            {{  $posisi->deadline_posisi  }}
        </div>
    </div> --}}
    <div class="row-md mt-3 mb-5">
        <a href="/dashboard/posisi" class="btn text-white" style="background: #EBA41F">Back</a>
        <a href="/dashboard/posisi/{{ $posisi->id }}/edit" class="btn btn-primary mx-2">Edit</a>
        <form action="/dashboard/posisi" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form>
        
    </div>
</div>


@endsection