@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex  flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <a href="/dashboard/pendaftar/{{$pivot->posisi_magang_id}}" class="badge bg-danger"><i class="bi bi-arrow-left-square " style="font-size: 1.5rem"></i></a><h1 class="h2 mx-2">Detail Pendaftar || {{ $daftar->name }}
    </h1>
</div>
@if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
@endif
<div class="container">
    <div class="row  shadow-lg p-3 rounded bg-body">
        <div class="col ">
            <div class="rounded mx-auto d-block text-center  mb-3 ">
                <img src="{{$daftar->foto_user}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>Nama</h6>
                </div>
                <div class="col fs-6">{{$daftar->name}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>Alamat</h6>
                </div>
                <div class="col fs-6">{{$daftar->alamat_user}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>email</h6>
                </div>
                <div class="col fs-6">{{$daftar->email}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>No. Tlp</h6>
                </div>
                <div class="col fs-6">{{$daftar->notlp_user}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>Kota</h6>
                </div>
                <div class="col fs-6">{{$kota->nama_kota}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>Pendidikan</h6>
                </div>
                <div class="col fs-6">{{$pendidikan->tingkat_pendidikan}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>Prodi</h6>
                </div>
                <div class="col fs-6">{{$prodi->nama_prodi}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>Skill</h6>
                </div>
                <div class="col fs-6">{{$skill->nama_skill}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>Status Daftar</h6>
                </div>
                <div class="col fs-6">
                    @if ($pivot->status_daftar == 'Proses' )
                    <div class="col fs-6"><span class="badge bg-warning text-dark">Proses</span></div>
                    @elseif ($pivot->status_daftar == 'Diterima')
                    <div class="col fs-6"><span class="badge bg-success">Diterima</span></div>
                    @elseif ($pivot->status_daftar == 'Ditolak')
                    <div class="col fs-6"><span class="badge bg-danger">Ditolak</span></div>
            
                    @endif
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>CV</h6>
                </div>
                <div class="col fs-6">{{$daftar->cv_user}}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <h6>Tanggal daftar</h6>
                </div>
                <div class="col fs-6">{{$pivot->tgl_daftar}}</div>
            </div>
            <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#ubahstatus">
                Ubah Status
            </button>
        </div>
        <div class="col">
            <div class="row mb-2">
                <div class="col-8">
                    <embed  class="rounded" src="{{asset('storage/' . $daftar->cv_user )}}" type="application/pdf" width="600" height="600">
                </div>
            </div>
        </div>
    </div>
</div>




{{-- MODAL UBAH STATUS --}}
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="ubahstatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dashboard/pendaftar/update/{{ $pivot->id }}" method="POST">
                @csrf
                <div class="modal-body">
                    <select class="form-select" name="status_daftar" id="status_daftar">
                        @if ($pivot->status_daftar == 'Diterima')
                            <option value="Diterima" selected>Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Proses">Proses</option>
                        @elseif ($pivot->status_daftar == 'Ditolak')
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak" selected>Ditolak</option>
                            <option value="Proses">Proses</option>
                        @else
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Proses" selected>Proses</option>
                        @endif
                        
                    </select>
                    <input type="hidden" value="{{ $daftar->id }}" name="user_id" id="user_id">
                    <input type="hidden" value="{{ $pivot->id }}" name="pivot_id" id="pivot_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            
            
        </div>
    </div>
</div>

@endsection