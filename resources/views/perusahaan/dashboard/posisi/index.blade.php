@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="shadow-lg p-3 mt-3  bg-body rounded  mb-3"><h5>POSISI MAGANG</h5></div>
@if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
@endif
<div class="shadow-lg p-3   bg-body rounded  mb-3">
@if (Auth::guard('perusahaan')->user()->status_perusahaan == 'proses' )
<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Akun Belum Terverifikasi ">
    <button class="btn btn-primary" type="button" disabled>Tambah Posisi Magang</button>
</span>
@elseif (Auth::guard('perusahaan')->user()->status_perusahaan == 'verifikasi')
<a href="/dashboard/posisi/create" class="btn btn-primary " >Tambah Posisi Magang</a>
@elseif (Auth::guard('perusahaan')->user()->status_perusahaan == 'ditolak')
<a href="" class="btn btn-primary disabled" >Tambah Posisi Magang</a>
@endif
{{-- <button type="button" class="btn btn-primary">Tambah Posisi Magang</button> --}}
<div class="table-responsive">
    <table class="table align-middle">

        <th>
            NO
        </th>
        <th>
            NAMA POSISI
        </th>
        <th>
            FOTO
        </th>
        <th>
            PERSYARATAN
        </th>
        {{-- <th>
            KETERANGAN
        </th> --}}
        <th>
            FASILITAS
        </th>
        {{-- <th>
            DESKRIPSI
        </th> --}}
        <th>
            DEADLINE
        </th>
        {{-- <th>
            CREATED AT
        </th> --}}
        <th class="col-2">
            ACTION
        </th>

        <tbody>
            @foreach ($posisis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_posisi }}</td>
                <td> <img src="{{ asset('storage/' . $item->foto_posisi) }}" height="30" width="30" alt=""> </td>
                <td>{!! $item->persyaratan_posisi !!}</td>
                {{-- <td>{!! $item->keterangan_posisi !!}</td> --}}
                <td>{!! $item->fasilitas_posisi !!}</td>
                {{-- <td>{!! $item->deskripsi_posisi !!}</td> --}}
                <td>{{ $item->deadline_posisi }}</td>
                {{-- <td>{{ $item->created_at }}</td> --}}
                <td>
                    <a href="/dashboard/posisi/{{ $item->id }}" style="text-decoration:none" class="badge bg-success"><i class="bi bi-eye d-inline" style="font-size: 1.5rem"></i></a>
                    {{-- <form action="/dashboard/posisi/{{ $item->id }}" method="Get" class="d-inline">
                        
                        @csrf
                        <button class="badge bg-danger mt-2 border-0" ><i class="bi bi-eye" style="font-size: 1.5rem"></i></button>
                    </form> --}}
                    {{-- <a href="{{ route('dashboard.posisi.show', $item) }}" class="badge bg-success"><i class="bi bi-eye" style="font-size: 1.5rem"></i></a> --}}
                    <a href="/dashboard/posisi/{{ $item->id }}/edit" style="text-decoration:none" class="badge bg-primary mt-2"><i class="bi bi-pencil-square d-inline" style="font-size: 1.5rem"></i></a>
                    <form action="/dashboard/posisi/{{ $item->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger mt-2 border-0" onclick="return confirm('Data Akan terhapus')"><i class="bi bi-trash" style="font-size: 1.5rem"></i></button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
{{-- <h4>{{ Auth::guard('perusahaan')->user() }}</h4> --}}
@endsection