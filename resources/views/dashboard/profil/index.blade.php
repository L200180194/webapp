@extends('dashboard.layoutsdashboard.main')
@section('container')
{{-- <div class="rounded mx-auto d-block text-center mt-5 ">
    <img src="{{url('/profil_perusahaan/profil1.jpg')}}" class="img-thumbnail mt-2 img-fluid" alt="..." width="250" height="250">
</div> --}}
<div class="container-md mt-5">
    <div class="card mb-5" style="background: #E6E6E7;">
        <div class="card-header">
            <div class="row">
                <div class="col-8"><h5>Profil</h5></div>
                <div class="col-4"><button type="button" class="btn btn-outline-secondary position-absolute end-0 mx-3" data-bs-toggle="modal" data-bs-target="#edit">
                    Edit
                </button></div>
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
                    {{ Auth::guard('perusahaan')->user()->deskripsi_perusahaan }}
                    @endif
                </div>
            </div>
        </div>
        
    </div>

    <div class="card mb-5" style="background: #E6E6E7;">
        <div class="card-header">
            <div class="row">
                <div class="col-8"><h5>Akun</h5></div>
                <div class="col-4"><button type="button" class="btn btn-outline-secondary position-absolute end-0 mx-3" data-bs-toggle="modal" data-bs-target="#gantipassword">
                    Ganti Password
                </button></div>
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

    <div class="card mb-5" style="background: #E6E6E7;">
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

                @elseif (Auth::guard('perusahaan')->user()->status_perusahaan == 'verfikasi')
                <div class="col fs-6"><span class="badge bg-success">Terverivikasi</span></div>

                @elseif (Auth::guard('perusahaan')->user()->status_perusahaan == 'ditolak')
                <div class="col fs-6"><span class="badge bg-success">Ditolak</span></div>

                @endif

                <div class="col fs-6"></div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Tanggal Perubahan Status</h6>
                </div>
                <div class="col fs-6">{{ Auth::guard('perusahaan')->user()->tgl_statusperusahaan }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-4">
                    <h6>Surat Perusahaan </h6>
                </div>
                <div class="col fs-6">{{ Auth::guard('perusahaan')->user()->surat_perusahaan }}</div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Profil -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        <div class="mb-3 mx-1">
                            <label for="nama_perusahaan" class="form-label">Nama</label>
                            <input type="text" name="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" placeholder="name@example.com" required value="{{ Auth::guard('perusahaan')->user()->nama_perusahaan }}">
                            @error('nama_perusahaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <div class="mb-3 mx-1">
                            <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                            <input type="text" name="alamat_perusahaan" class="form-control @error('alamat_perusahaan') is-invalid @enderror" id="alamat_perusahaan" placeholder="name@example.com" required value="{{ Auth::guard('perusahaan')->user()->alamat_perusahaan }}">
                            @error('alamat_perusahaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <div class="mb-3 mx-1">
                            <label for="notlp_perusahaan" class="form-label">No Telepon</label>
                            <input type="text" name="notlp_perusahaan" class="form-control @error('notlp_perusahaan') is-invalid @enderror" id="notlp_perusahaan" placeholder="name@example.com" required value="{{ Auth::guard('perusahaan')->user()->notlp_perusahaan }}">
                            @error('notlp_perusahaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <div class="mb-3 mx-1">
                            <label for="deskripsi_perusahaan" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi_perusahaan" class="form-control @error('deskripsi_perusahaan') is-invalid @enderror" id="deskripsi_perusahaan" placeholder="Deskripsi Perusahaan" required " cols="30" rows="5">{{ Auth::guard('perusahaan')->user()->deskripsi_perusahaan }}</textarea>
                            @error('deskripsi_perusahaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3 mx-1">
                            <fieldset disabled>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ Auth::guard('perusahaan')->user()->email }}">
                            @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                            </fieldset>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ganti Password -->
    <div class="modal fade" id="gantipassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
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
                            <input type="password" class="form-control" id="password" name="password"  placeholder="password" required>
                            @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <div class="mb-3 mx-1">
                            <label for="passwordbaru" class="form-label @error('passwordbaru') is-invalid @enderror">Masukkan Password Lama</label>
                            <input type="password" class="form-control" id="passwordbaru" name="passwordbaru"  placeholder="password baru" required>
                            @error('passwordbaru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <a href="" class="btn btn-danger mb-5 ">Logout</a>
    {{-- {{ Auth::guard('perusahaan')->user() }} --}}
</div>


@endsection