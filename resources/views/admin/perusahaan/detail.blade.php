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
{{-- GAMBAR PROFIL --}}
{{-- <div class="rounded mx-auto d-block text-center mt-5 ">
    @if ( Auth::guard('admin')->user()->foto_perusahaan == null)
    <img src="{{url('/profil_perusahaan/perusahaan.jpg')}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
    @else
    <img src="{{asset('storage/' . Auth::guard('perusahaan')->user()->foto_perusahaan )}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
    @endif
    
</div> --}}
<div class="card justify-content-center mt-5">
    <div class="shadow p-3  bg-body rounded "><h5>PROFIL PERUSAHAAN</h5></div>
</div>

<div class="card shadow p-3 mb-5 bg-body rounded mt-3">
    {{-- GAMBAR PROFIL --}}
    <div class="rounded mx-auto d-block text-center mt-5 ">
        @if ( $perusahaan->foto_perusahaan == null)
        <img src="{{url('/profil_perusahaan/perusahaan.jpg')}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
        @else
        <img src="{{asset('storage/' . $perusahaan->foto_perusahaan )}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
        @endif
        <div class=" justify-content-center mb-3 mt-3">
            @if ($perusahaan->status_perusahaan == 'proses')
            <h4>
                <span class="badge rounded-pill bg-primary">Proses</span>
            </h4>
            @elseif ($perusahaan->status_perusahaan == 'verifikasi')
            <h4>
                <span class="badge rounded-pill bg-success">Verifikasi</span>
            </h4>
            @else
            <h4>
                <span class="badge rounded-pill bg-danger">Ditolak</span>
            </h4>
            @endif
        </div>
    </div>
    
    <div class="row mb-1">
        <div class="col-4">
            <h6>Nama </h6>
        </div>
        <div class="col fs-6">{{ $perusahaan->nama_perusahaan}} </div>
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Alamat </h6>
        </div>
        <div class="col fs-6">{{ $perusahaan->alamat_perusahaan }} </div>
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>No Telepon</h6>
        </div>
        <div class="col fs-6"> {{ $perusahaan->notlp_perusahaan }} </div>
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Email</h6>
        </div>
        <div class="col fs-6"> {{ $perusahaan->email }} </div>
    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Deskripsi</h6>
        </div>
        <div class="col fs-6">
            @if ( $perusahaan->deskripsi_perusahaan == null)
            PROFIL BELUM LENGKAP
            @else
            {!!  $perusahaan->deskripsi_perusahaan !!}

            @endif
        </div>

    </div>
    <div class="row mb-1">
        <div class="col-4">
            <h6>Surat Perusahaan </h6>
        </div>
        <div class="col fs-6">
            @if ( $perusahaan->surat_perusahaan == null)
            PROFIL BELUM LENGKAP
            @else
            <embed  class="rounded" src="{{asset('storage/' . $perusahaan->surat_perusahaan )}}" type="application/pdf" width="600" height="600">
            @endif
        </div>
    </div>
    <div class="my-4">
        <a href="/admin/perusahaan/back{{ $perusahaan->status_perusahaan }}" class="btn text-white" style="background: #EBA41F">Back</a>
        {{-- <a href="/backprev" class="btn text-white" style="background: #EBA41F">Back</a> --}}
        {{-- <a href="" class="btn btn-primary mx-2">Edit Status</a> --}}
        {{-- MODAL UBAH STATUS --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary " {{ $perusahaan->surat_perusahaan == null?'disabled':'' }}  data-bs-toggle="modal" data-bs-target="#ubahstatus">
            Ubah Status
        </button>
        {{-- <form action="" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form> --}}
    </div>
</div>
    {{ $perusahaan }}
</div>



<!-- Modal -->
<div class="modal fade" id="ubahstatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/perusahaan/detail/update{{ $perusahaan->id }}" method="POST">
                @csrf
                <div class="modal-body">
                    <select class="form-select" name="status_perusahaan" id="status_perusahaan">
                        @if ($perusahaan->status_perusahaan == 'proses')
                            <option value="proses" selected>Proses</option>
                            <option value="verifikasi">Verifikasi</option>
                            <option value="ditolak">Ditolak</option>
                        @elseif ($perusahaan->status_perusahaan == 'verifikasi')
                        <option value="proses" >Proses</option>
                        <option value="verifikasi" selected>Verifikasi</option>
                        <option value="ditolak">Ditolak</option>
                        @else
                        <option value="proses" >Proses</option>
                        <option value="verifikasi" >Verifikasi</option>
                        <option value="ditolak" selected>Ditolak</option>
                        @endif
                        
                    </select>
                    <input type="hidden" value="{{ $perusahaan->id }}" name="perusahaan_id" id="perusahaan_id">
                    {{-- <input type="hidden" value="{{ $pivot->id }}" name="pivot_id" id="pivot_id"> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
    {{-- <h4>{{ Auth::guard('admin')->user() }}</h4> --}}
    @endsection