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
        <div class="container-md mt-5 col-5  ">
            <div class="row justify-content-center">
                
            </div>
            <div class="shadow p-3 mb-3 bg-body rounded d-flex justify-content-center ">
                <h4 class="justify-content-center">TAMBAH ADMIN</h4>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded ">
                <form action="/admin/admins" method="POST">
                    @csrf
                    <div class="mb-3 mx-1">
                        <label for="nama_admin" class="form-label">Nama Admin</label>
                        <input type="text" name="nama_admin" class="form-control @error('nama_admin') is-invalid @enderror" id="nama_admin" placeholder="My Intern Admin" required value="{{ old('nama_admin') }}">
                        @error('nama_admin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 mx-1">
                        <label for="alamat_admin" class="form-label">Alamat Admin</label>
                        <input type="text" name="alamat_admin" class="form-control @error('alamat_admin') is-invalid @enderror" id="alamat_admin" placeholder=" Jl. My Intern Admin" required value="{{ old('alamat_admin') }}">
                        @error('alamat_admin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 mx-1">
                        <label for="tlp_admin" class="form-label">No Telepon Admin</label>
                        <input type="text" name="tlp_admin" class="form-control @error('tlp_admin') is-invalid @enderror" id="tlp_admin" placeholder="085*******1" required value="{{ old('tlp_admin') }}">
                        @error('tlp_admin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
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
                        <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password " required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 mx-1">
                        <label for="password_confirmation" class="form-label @error('password_confirmation') is-invalid @enderror">Masukkan Ulang Password </label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password " required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 mx-1">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="shadow p-3 mb-3 mt-4 bg-body rounded justify-content-center ">
            <h4 class="justify-content-center text-danger">AKSES DITOLAK</h4>
        </div>
    @endif
    
@endsection