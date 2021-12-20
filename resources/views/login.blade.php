@extends('layouts.main')
@section('body')
<div class="row justify-content-center mt-5 mb-5 ">
    <div class="col-md-4">
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('Success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <main class="form-signin">
            <img src="{{url('/images/myintern.png')}}" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" width="300" height="100" loading="lazy">
            {{-- <h1 class="text-center">MyIntern</h1> --}}
            <h1 class="h3 mb-3 fw-normal mt-2 text-center">Please Login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating mb-2">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating ">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
        
                {{-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> --}}
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
                
            </form>
            <small class="d-block mt-2">Belum Registrasi ? <a href="/registrasi">Registrasi sekarang</a></small>
        </main>
    </div>
</div>
@endsection
