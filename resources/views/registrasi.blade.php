@extends('layouts.main')
@section('body')
<div class="container shadow-lg p-3 mt-3 mb-5 bg-body rounded">
    <div class="row justify-content-center">
        <div class="col-md-6 my-auto"><img src="{{url('/images/Internship-rafiki.svg')}}" alt=""></div>
        <div class="col-md-4">

            <h1 class="h3 mb-3 fw-strong mt-2 text-center">Registrasi</h1>
            <form action="/registrasi" method="POST">
                @csrf
                <div class="mb-3 mx-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                </div>
                <div class="mb-3 mx-1">
                    <label for="password" class="form-label @error('password') is-invalid @enderror">password</label>
                    <input type="password" class="form-control" id="password" name="password"  placeholder="password" required>
                    @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                </div>
                {{-- <div class="mb-3 mx-1">
                    <label for="passwordv" class="form-label">Verifikasi Password</label>
                    <input type="password" class="form-control" id="passwordv" name="passwordv"  placeholder="Verifikasi Password" required>
                </div> --}}
                <div class="mb-3 mx-1">
                    <label for="nama_perusahaan" class="form-label @error('nama_perusahaan') is-invalid @enderror">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Pt. MyIntern" required value="{{ old('nama_perusahaan') }}">
                    @error('nama_perusahaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                </div>
                <div class="mb-3 mx-1">
                    <label for="notlp_perusahaan" class="form-label">No Telpon</label>
                    <input type="number" class="form-control" id="notlp_perusahaan" name="notlp_perusahaan" required placeholder="085********6" value="{{ old('notlp_perusahaan') }}">
                </div>
                <div class="mb-3 mx-1">
                    <label for="alamat_perusahaan" class="form-label">Alamat </label>
                    <input type="text" class="form-control" id="alamat_perusahaan"  name="alamat_perusahaan" placeholder="Jl. MyIntern No 5, Jakarta Pusat" value="{{ old('alamat_perusahaan') }}">
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3 mx-1" type="submit">Registrasi</button>
            </form>
            <small class="d-block mt-2 mx-1">Sudah Registrasi ? <a href="/login">Login</a></small>
        </div>
    </div>
</div>

@endsection