@extends('dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Tambah Posisi Magang
    </h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/posisi" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_posisi" class="form-label">Nama Posisi</label>
            <input type="text" class="form-control @error('nama_posisi') is-invalid @enderror" id="nama_posisi"  name="nama_posisi" placeholder="Web Developer" required value="{{ old('nama_posisi') }}">
            @error('nama_posisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
        </div>
        <div class="mb-3">
            <label for="foto_posisi" class="form-label">Foto</label>
            <input class="form-control @error('foto_posisi') is-invalid @enderror"  type="file" id="foto_posisi" name="foto_posisi" required >
            @error('foto_posisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
        </div>
        <div class="mb-3">
            <label for="deadline_posisi" class="form-label">Deadline</label>
            <input type="date" class="form-control @error('deadline_posisi') is-invalid @enderror" id="deadline_posisi" name="deadline_posisi" required value="{{ old('deadline_posisi') }}">
            @error('deadline_posisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="persyaratan_posisi" class="form-label">Persyaratan </label>
            <input id="persyaratan_posisi"  type="hidden" name="persyaratan_posisi" value="{{ old('persyaratan_posisi') }}">
            <trix-editor input="persyaratan_posisi"></trix-editor>
            @error('persyaratan_posisi')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fasilitas_posisi" class="form-label">Fasilias </label>
            <input id="fasilitas_posisi"  type="hidden" name="fasilitas_posisi" value="{{ old('fasilitas_posisi') }}">
            <trix-editor input="fasilitas_posisi"></trix-editor>
            @error('fasilitas_posisi')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi_posisi" class="form-label">Deskripsi </label>
            <input id="deskripsi_posisi"  type="hidden" name="deskripsi_posisi" value="{{ old('deskripsi_posisi') }}">
            <trix-editor input="deskripsi_posisi"></trix-editor>
            @error('deskripsi_posisi')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan_posisi" class="form-label">Keterangan </label>
            <input id="keterangan_posisi" type="hidden" name="keterangan_posisi" value="{{ old('keterangan_posisi') }}">
            <trix-editor input="keterangan_posisi"></trix-editor>
            @error('keterangan_posisi')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
</div>
<script>
    document.addEventListener('trix-file-accept',function(e){
        e.preventDevault()
    })
</script>
@endsection
