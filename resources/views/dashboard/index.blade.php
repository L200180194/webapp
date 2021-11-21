@extends('dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome {{ Auth::guard('perusahaan')->user()->nama_perusahaan }}
    </h1>
</div>
<div class="row ">
    <div class="col-md-3">
        <a href="" style="text-decoration:none">
            <div class="card text-white bg-success mb-3 " style="max-width: 18rem;">
                <!-- <div class="card-header"><strong>Posisi Magang</strong> </div> -->
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <i class="bi bi-journal-text" style="font-size: 4.5rem; "></i>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Posisi Magang</h5>
                                <p class="card-text">Posisi Magang di {{ Auth::guard('perusahaan')->user()->nama_perusahaan }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="" style="text-decoration:none">
            <div class="card text-white bg-danger mb-3 " style="max-width: 18rem;">

                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <i class="bi bi-file-earmark-person" style="font-size: 4.5rem; "></i>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Pendaftaran</h5>
                                <p class="card-text">Pendaftar di {{ Auth::guard('perusahaan')->user()->nama_perusahaan }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="col-md-3">
        <a href="" style="text-decoration:none">
            <div class="card text-white bg-dark mb-3 " style="max-width: 18rem;">
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <i class="bi bi-building" style="font-size: 4.5rem; "></i>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Profil</h5>
                                <p class="card-text">Profil {{ Auth::guard('perusahaan')->user()->nama_perusahaan }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    </div>
</div>
{{-- <h4>{{ Auth::guard('perusahaan')->user() }}</h4> --}}
@endsection