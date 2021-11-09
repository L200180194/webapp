@extends('layouts.main')
@section('body')
<div class="container col-xxl-8 px-4 py-5 justify-content-center">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{url('/images/home_ilustration.svg')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">MyIntern</h1>
            <p class="lead">Menghubungkan setiap perusahaan maupun start up dengan sumber daya yang berkualitas di Indonesia</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Login</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">register</button>
            </div>
        </div>
    </div>
</div>
@endsection