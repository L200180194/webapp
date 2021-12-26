@extends('perusahaan.dashboard.layoutsdashboard.main')
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
@error('foto_perusahaan' or 'surat_perusahaan' or 'nama_perusahaan' or 'alamat_perusahaan' or 'notlp_perusahaan' or 'deskripsi_perusahaan' or 'password'or 'passwordbaru' or 'passwordbaru_confirmation')
<div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
<div class="rounded mx-auto d-block  text-center mt-5 ">
    @if ( Auth::guard('perusahaan')->user()->foto_perusahaan == null)
    <img src="{{url('/profil_perusahaan/perusahaan.jpg')}}" class="img-thumbnail mt-2 img-fluid shadow-lg" alt="..." width="250" height="250">
    @else
    <img src="{{asset('storage/' . Auth::guard('perusahaan')->user()->foto_perusahaan )}}" class="img-thumbnail shadow-lg mt-2 img-fluid" alt="..." width="250" height="250">
    @endif
    {{-- <img src="{{url('/profil_perusahaan/profil1.jpg')}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250"> --}}
</div>
<div class="container-md mt-5">
    <div class="card mb-4 shadow-lg rounded " >
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h5>Profil</h5>
                </div>
                <div class="col-4 mx-auto ">
                    {{-- <button type="button" class="btn btn-outline-secondary position-absolute end-0 mx-3" data-bs-toggle="modal" data-bs-target="#edit">
                        Edit
                    </button> --}}
                    <a href="/dashboard/profil/edit-profil" class="btn btn-outline-secondary position-absolute end-0 mx-3">Edit</a>
                </div>
            </div>


        </div>
        <div class="card-body">
            {{-- <h5 class="card-title">Profil Peruahaan</h5> --}}
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Nama </h6>
                </div>
                <div class="col fs-6">{{ Auth::guard('perusahaan')->user()->nama_perusahaan }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Alamat </h6>
                </div>
                <div class="col fs-6">{{ Auth::guard('perusahaan')->user()->alamat_perusahaan }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>No Telepon</h6>
                </div>
                <div class="col fs-6">{{ Auth::guard('perusahaan')->user()->notlp_perusahaan }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Deskripsi</h6>
                </div>
                <div class="col fs-6">
                    @if (Auth::guard('perusahaan')->user()->deskripsi_perusahaan == null)
                    Mohon Lengkapi profil
                    @else
                    {!! Auth::guard('perusahaan')->user()->deskripsi_perusahaan !!}

                    @endif
                </div>

            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Surat Perusahaan </h6>
                </div>
                <div class="col fs-6">
                    @if (Auth::guard('perusahaan')->user()->surat_perusahaan == null)
                    Mohon Lengkapi profil
                    @else
                    <a href="/dashboard/profil/surat-perusahaan" class="btn btn-primary mb-4"> lihat surat</a>
                    @endif
                </div>

            </div>
        </div>

    </div>

    <div class="card mb-4 shadow-lg rounded" >
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h5>Akun</h5>
                </div>
                <div class="col-4">
                    {{-- <button type="button" class="btn btn-outline-secondary position-absolute end-0 mx-3" data-bs-toggle="modal" data-bs-target="#gantipassword">
                        Ganti Password
                    </button> --}}
                    <a href="/dashboard/profil/ganti-password" class="btn btn-outline-secondary position-absolute end-0 mx-3">Ganti Password</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            {{-- <h5 class="card-title">Profil Peruahaan</h5> --}}
            <div class="row mb-1">
                <div class="col-4">
                    <h6>email </h6>
                </div>
                <div class="col fs-6">{{ Auth::guard('perusahaan')->user()->email }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>password </h6>
                </div>
                <div class="col fs-6">********</div>
            </div>

        </div>
    </div>

    <div class="card mb-4 shadow-lg rounded" >
        <div class="card-header">
            <h5>Status Perusahaan</h5>
        </div>
        <div class="card-body">
            {{-- <h5 class="card-title">Profil Peruahaan</h5> --}}
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Status Perusahaan </h6>
                </div>
                @if (Auth::guard('perusahaan')->user()->status_perusahaan == 'proses' )
                <div class="col fs-6"><span class="badge bg-warning text-dark">Proses Verifikasi</span></div>

                @elseif (Auth::guard('perusahaan')->user()->status_perusahaan == 'verifikasi')
                <div class="col fs-6"><span class="badge bg-success">Terverivikasi</span></div>

                @elseif (Auth::guard('perusahaan')->user()->status_perusahaan == 'ditolak')
                <div class="col fs-6"><span class="badge bg-success">Ditolak</span></div>
                @elseif (Auth::guard('perusahaan')->user()->status_perusahaan == 'unverif')
                <div class="col fs-6"><span class="badge bg-warning text-dark">Proses Verifikasi</span></div>

                @endif

                <div class="col fs-6"></div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Tanggal Perubahan Status</h6>
                </div>
                <div class="col fs-6">{{ Auth::guard('perusahaan')->user()->tgl_statusperusahaan }}</div>
            </div>

        </div>
    </div>

    <form action="/logoutperusahaan" method="POST">
        @csrf
        <button class="btn btn-danger mb-4">Log Out</button>
        {{-- <a class="nav-link px-3" href="#">Sign out</a> --}}
    </form>
    <style>
        #embedres{
            min-width: 200;
            min-height: 200;
        }
    </style>
    {{-- Auth::guard('perusahaan')->user()->surat_perusahaan --}}
    {{-- <embed  class="embedres" src="{{asset('storage/' . Auth::guard('perusahaan')->user()->surat_perusahaan )}}" type="application/pdf" width="600" height="800">
        <div class="ratio ratio-1x1">
            <div><embed src="{{asset('storage/' . Auth::guard('perusahaan')->user()->surat_perusahaan )}}" type="application/pdf" width="600" height="400"></div>
          </div> --}}

    {{-- {{ Auth::guard('perusahaan')->user() }} --}}

</div>
<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDevault()
    })

    function previewImage() {
        const image = document.querySelector('#foto_perusahaan');
        const imgprev = document.querySelector('.img-preview');
        imgprev.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgprev.src = oFREvent.target.result;
        }
    }
</script>

@endsection