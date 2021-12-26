@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="col-8 mx-auto">
<div class="shadow-lg p-3 mt-3  bg-body rounded  mb-3 "><h5>EDIT PROFIL PERUSAHAAN</h5></div>
<div class="shadow-lg p-3 mt-3 mb-5 bg-body rounded  mb-3 ">
    <form action="/dashboard/profil" enctype="multipart/form-data" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="foto_perusahaan" class="form-label">Foto Perusahaan</label>
            @if (Auth::guard('perusahaan')->user()->foto_perusahaan)
            <img src="{{ asset('storage/' . Auth::guard('perusahaan')->user()->foto_perusahaan ) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img alt="" class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('foto_perusahaan') is-invalid @enderror" type="file" id="foto_perusahaan" name="foto_perusahaan" onchange="previewImage()">
            @error('foto_perusahaan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surat_perusahaan" class="form-label">Surat Perusahaan</label>
            @if (Auth::guard('perusahaan')->user()->surat_perusahaan)
            <img src="{{ asset('storage/' . Auth::guard('perusahaan')->user()->surat_perusahaan ) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            <a href="">{{ asset('storage/' . Auth::guard('perusahaan')->user()->surat_perusahaan ) }}</a>
            @endif
            <input class="form-control @error('surat_perusahaan') is-invalid @enderror" type="file" id="surat_perusahaan" name="surat_perusahaan">
            @error('surat_perusahaan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
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
            <label for="deskripsi_perusahaan" class="form-label">Deskripsi </label>
            <input id="deskripsi_perusahaan" type="hidden" name="deskripsi_perusahaan" value="{{ old('deskripsi_perusahaan',Auth::guard('perusahaan')->user()->deskripsi_perusahaan) }}">
            <trix-editor input="deskripsi_perusahaan"></trix-editor>
            @error('deskripsi_perusahaan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        
            <a href="/dashboard/profil" class="btn text-white" style="background: #EBA41F">Back</a>
            <button type="submit" class="btn btn-primary">Save changes</button>
        
    </form>
</div>
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