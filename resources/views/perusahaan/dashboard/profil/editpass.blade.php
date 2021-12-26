@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="col-8 mx-auto">
<div class="shadow-lg p-3 mt-3  bg-body rounded  mb-3 ">
    <h5>GANTI PASSWORD</h5>
</div>
<div class="shadow-lg p-3 mt-3 mb-5 bg-body rounded  mb-3 ">
    <form action="/dashboard/profil/update-password" method="POST">
        @csrf
        <div class="mb-3 mx-1">
            <fieldset disabled>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ Auth::guard('perusahaan')->user()->email }}">
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
        
    <a href="/dashboard/profil" class="btn text-white" style="background: #EBA41F">Back</a>
    <button type="submit" class="btn btn-primary">Save changes</button>


</form>
</div>
</div>

@endsection