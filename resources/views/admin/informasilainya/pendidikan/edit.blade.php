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

<div class="container-md mt-5 ">
    <div class=" justify-content-center mb-3">
        <div class="shadow p-3   bg-body rounded "><h5> Edit Pendidikan</h5></div>
    </div>
    <div class="shadow p-3 mb-5 bg-body rounded mt-3">
        <form action="/admin/informasilainya/pendidikan/{{ $pendidikan->id }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3 mx-1">
                <label for="nama_admin" class="form-label">Jenjang Pendidikan</label>
                <input type="text" name="tingkat_pendidikan" class="form-control @error('tingkat_pendidikan') is-invalid @enderror" id="tingkat_pendidikan" placeholder="My Intern Admin" required value="{{ $pendidikan->tingkat_pendidikan }}">
                @error('tingkat_pendidikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 mx-1">
                <button type="submit" class="btn btn-primary">Save Change</button>
            </div>
        </form>
    </div>

@endsection