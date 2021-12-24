@extends('layouts.main')
@section('body')
{{-- <div class="container col-xxl-8 px-4 py-5 shadow ">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6 align-self-center">
            <img src="{{url('/images/homeblue.svg')}}" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
</div>
<div class="col-lg-6">
    <h1 class="display-5 fw-bold lh-1 mb-3">MyIntern</h1>
    <p class="lead">Menghubungkan setiap perusahaan maupun start up dengan sumber daya yang berkualitas di Indonesia</p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="/login" class="btn btn-primary btn-lg px-4 me-md-2"> Masuk</a>
        <a href="/registrasi" class="btn btn-outline-secondary btn-lg px-4"> Daftar</a>
    </div>
</div>
</div>
</div> --}}


<div class="container mt-3 ">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-4  ">
            <img src="{{url('/images/homeblue.svg')}}" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">MyIntern</h1>
            <p class="lead">Menghubungkan setiap perusahaan maupun start up dengan sumber daya yang berkualitas di Indonesia</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <a href="/login" class="btn btn-primary btn-lg px-4 me-md-2"> Masuk</a>
                <a href="/registrasi" class="btn btn-outline-secondary btn-lg px-4"> Daftar</a>
            </div>
        </div>

    </div>
</div>
<div class="container p-0">
    <div class="row mb-2 mt-4 p-0 ">
        <div class="col-md-4">
            <a href="/about" style="text-decoration:none">
                <div class="row g-0 p-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative rounded-3 border shadow-lg">
                    <h5 class="d-flex justify-content-center mt-3  text-dark">ABOUT US</h5>
                    <img src="{{url('/images/aboutus.svg')}}" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" width="250" height="50" loading="lazy">
                </div>
            </a>

        </div>
        <div class="col-md-4">
            <a href="/syarat-ketentuan" style="text-decoration:none">
                <div class=" row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative rounded-3 border shadow-lg">
                    <h5 class="d-flex justify-content-center text-dark mt-3">SYARAT & KETENTUAN</h5>
                    <img src="{{url('/images/agreement.svg')}}" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" width="300" height="100" loading="lazy">
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/FQA" style="text-decoration:none">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative rounded-3 border shadow-lg">
                    <h5 class="d-flex justify-content-center mt-3 text-dark">FREQUENTLY QUESTION</h5>
                    <img src="{{url('/images/question.svg')}}" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" width="300" height="100" loading="lazy">
                </div>
            </a>
        </div>
    </div>

</div>
</div>

{{-- <div class="container mt-3  ">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5  align-items-center rounded-3 border shadow-lg">
        
            <img src="{{url('/images/homeblue.svg')}}" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">



</div>
<div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
    <div class="col-lg-4  ">
        <img src="{{url('/images/homeblue.svg')}}" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
    </div>


</div>
</div> --}}


@endsection