@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="col-8 mx-auto">
    <div class="shadow-lg p-3 mt-3  bg-body rounded  mb-3 ">
        <h5>EDIT POSISI MAGANG</h5>
    </div>
    <div class="shadow-lg p-3 mt-3 mb-5 bg-body rounded  mb-3 ">
        <form method="POST" action="/dashboard/posisi/{{ $posisi->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama_posisi" class="form-label">Nama Posisi</label>
                <input type="text" class="form-control @error('nama_posisi') is-invalid @enderror" id="nama_posisi" name="nama_posisi" placeholder="Web Developer" required value="{{ old('nama_posisi',$posisi->nama_posisi) }}">
                @error('nama_posisi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto_posisi" class="form-label">Foto</label>
                {{-- <img src="{{ asset('storage/' . $posisi->foto_posisi) }}" class="img-thumbnail img-fluid" alt="..." width="400px" height="40px">
                <img src="{{  asset('storage/' . $posisi->foto_posisi) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5"> --}}
                @if ($posisi->foto_posisi)
                    <img src="{{  asset('storage/' . $posisi->foto_posisi) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                <img alt="" class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('foto_posisi') is-invalid @enderror"  type="file" id="foto_posisi" name="foto_posisi"  onchange="previewImage()">
                @error('foto_posisi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deadline_posisi" class="form-label">Deadline</label>
                <input type="date" class="form-control @error('deadline_posisi') is-invalid @enderror" id="deadline_posisi" name="deadline_posisi" required value="{{  old('deadline_posisi',$posisi->deadline_posisi) }}">
                @error('deadline_posisi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="persyaratan_posisi" class="form-label">Persyaratan </label>
                <input id="persyaratan_posisi" type="hidden" name="persyaratan_posisi" value="{{ old('persyaratan_posisi',$posisi->persyaratan_posisi) }}">
                <trix-editor input="persyaratan_posisi"></trix-editor>
                @error('persyaratan_posisi')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fasilitas_posisi" class="form-label">Fasilias </label>
                <input id="fasilitas_posisi" type="hidden" name="fasilitas_posisi" value="{{ old('$posisi->fasilitas_posisi',$posisi->fasilitas_posisi) }}">
                <trix-editor input="fasilitas_posisi"></trix-editor>
                @error('fasilitas_posisi')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi_posisi" class="form-label">Deskripsi </label>
                <input id="deskripsi_posisi" type="hidden" name="deskripsi_posisi" value="{{ old('deskripsi_posisi',$posisi->deskripsi_posisi) }}">
                <trix-editor input="deskripsi_posisi"></trix-editor>
                @error('deskripsi_posisi')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan_posisi" class="form-label">Keterangan </label>
                <input id="keterangan_posisi" type="hidden" name="keterangan_posisi" value="{{ old('keterangan_posisi',$posisi->keterangan_posisi) }}">
                <trix-editor input="keterangan_posisi"></trix-editor>
                @error('keterangan_posisi')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" name="nama_file" id="nama_file" value="{{ $posisi->foto_posisi }}">
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDevault()
    })
    function previewImage (){
    const image = document.querySelector('#foto_posisi');
    const imgprev = document.querySelector('.img-preview');
    imgprev.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent){
        imgprev.src=oFREvent.target.result;
    }
    }
</script>
@endsection