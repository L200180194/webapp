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
<div class="shadow p-3 mb-5 bg-body rounded mt-3">
    <nav class="nav nav-pills nav-justified ">
        <a class="nav-link active" aria-current="page" href="#">Proses</a>
        <a class="nav-link" href="#">Diterima</a>
        <a class="nav-link" href="#">Ditolak</a>
    </nav>
</div>
<div class="shadow p-3 mb-5 bg-body rounded mt-3">
    <div class="table-responsive">
        <table class="table align-middle">
    
            <th>
                NO
            </th>
            <th>
                NAMA PERUSAHAAN
            </th>
            <th>
                FOTO
            </th>
            {{-- <th>
                SURAT
            </th> --}}
            
            <th>
                STATUS 
            </th>
            <th class="col-2">
                ACTION
            </th>
    
            <tbody>
                @foreach ($proses as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_perusahaan }}</td>
                    <td> <img src="{{ asset('storage/' . $item->foto_perusahaan) }}" height="30" width="30" alt=""> </td>
                    <td>{{ $item->status_perusahaan }}</td>
                    <td>
                        <a href="/admin/perusahaan/detail{{ $item->id }}" style="text-decoration:none" class="badge bg-success"><i class="bi bi-eye d-inline" style="font-size: 1.5rem"></i></a>
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
    {{ $proses }}
</div>
    {{-- <h4>{{ Auth::guard('admin')->user() }}</h4> --}}
    @endsection