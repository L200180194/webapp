@extends('dashboard.layoutsdashboard.main')
@section('container')
<div class="container my-9 mb-5">
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
    </div>
    <div class="row-md mt-3 mb-5">
        <a href="/dashboard/posisi" class="btn text-white" style="background: #EBA41F">Back</a>
        <a href="" class="btn btn-primary mx-2">Edit</a>
        <form action="/dashboard/posisi" method="POST">
            @method('delete')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form>
        
    </div>
</div>


@endsection