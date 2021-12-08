@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-sm-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome {{ Auth::guard('perusahaan')->user()->nama_perusahaan }} 
        @if (Auth::guard('perusahaan')->user()->surat_perusahaan == null)
            | Lengkapi Profil
            @elseif (Auth::guard('perusahaan')->user()->status_perusahaan == 'unverif' or Auth::guard('perusahaan')->user()->status_perusahaan == 'proses' and Auth::guard('perusahaan')->user()->surat_perusahaan != null )
            | Proses verivikasi 
        @endif
    </h1>
</div>
<div class="row ">
    <div class="col-sm-3">
        <a href="/dashboard/posisi" style="text-decoration:none">
            <div class="card text-white bg-success mb-3 " style="max-width: 18rem; min-height:10rem; min-width:7rem;">
                <!-- <div class="card-header"><strong>Posisi Magang</strong> </div> -->
                <div class="card-body" style="max-height: 10rem">
                    <div class="row g-0">
                        <div class="col-sm-3 ">
                            
                            <div class="mt-4 "> <svg xmlns="http://www.w3.org/2000/svg"  style="max-width: 5rem; min-height:3rem; min-width:3rem; max-height: 5rem; " fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                              </svg></div>
                            
                        </div>
                        <div class="col-sm-9">
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
    
    <div class="col-sm-3">
        <a href="/dashboard/pendaftar" style="text-decoration:none">
            <div class="card text-white bg-danger mb-3 " style="max-width: 18rem; min-height:10rem; min-width:7rem;">

                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-sm-3">
                            <div class="mt-4 "> <svg xmlns="http://www.w3.org/2000/svg" style="max-width: 5rem; min-height:3rem; min-width:3rem; max-height: 5rem; " fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                              </svg></div>
                            {{-- <i class="bi bi-file-earmark-person" style="font-size: 4.5rem; "></i> --}}
                        </div>
                        <div class="col-sm-9">
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
    
    <div class="col-sm-3">
        <a href="/dashboard/profil" style="text-decoration:none">
            <div class="card text-white bg-dark mb-3 " style="max-width: 18rem; min-height:10rem; min-width:7rem;">
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-sm-3">
                            <div class="mt-4 "> <svg xmlns="http://www.w3.org/2000/svg" style="max-width: 5rem; min-height:3rem; min-width:3rem; max-height: 5rem; " fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                                <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                              </svg></div>
                            {{-- <i class="bi bi-building" style="font-size: 4.5rem; "></i> --}}
                        </div>
                        <div class="col-sm-9">
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