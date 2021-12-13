@extends('admin.layoutsdashboard.main')
@section('container')
<div class="row justify-content-center">
    @if (session()->has('message'))
<div class="alert alert-danger alert-dismissible fade show mt-3 col-5" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
    
</div>
<div class="row justify-content-center">
    <div class="shadow p-3 mt-4 col-5 bg-body rounded "><h5>Edit Password</h5></div>
</div>

<div class="row justify-content-center">
    <div class="shadow p-3 mb-5 mt-3 bg-body rounded col-5 align-self-center ">
        <form action="/admin/profiladmin/edit/update-password" method="POST">
            @csrf
            <div class="mb-3 mx-1">
                <fieldset disabled>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ Auth::guard('admin')->user()->email }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>
            </div>
            <div class="mb-3 mx-1">
                <label for="password" class="form-label @error('password') is-invalid @enderror">Masukkan Password Lama</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 mx-1">
                <label for="passwordbaru" class="form-label @error('passwordbaru') is-invalid @enderror">Masukkan Password baru</label>
                <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="password baru" required>
                @error('passwordbaru')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 mx-1">
                <label for="passwordbaru_confirmation" class="form-label @error('passwordbaru_confirmation') is-invalid @enderror">Masukkan Ulang Password baru</label>
                <input type="password" class="form-control" id="passwordbaru_confirmation" name="passwordbaru_confirmation" placeholder="password baru" required>
                @error('passwordbaru')
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
    
    
{{-- <h4>{{ Auth::guard('admin')->user() }}</h4> --}}
@endsection