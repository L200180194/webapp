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

<div class="container-md mt-5 ">
    <div class=" justify-content-center mb-3">
        <div class="shadow p-3   bg-body rounded "><h5>POSISI MAGANG</h5></div>
    </div>
    <div class="shadow p-3 mb-5 bg-body rounded mt-3">
        <div class="col-6 my-3">
            <form action="/admin/posisimagang">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-info text-white" type="submit" > Search</button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
        
                <th>
                    NO
                </th>
                <th>
                    NAMA POSISI
                </th>
                {{-- <th>
                    FOTO
                </th> --}}
                {{-- <th>
                    SURAT
                </th> --}}
                
                <th>
                    DEADLINE 
                </th>
                <th>
                    PERUSAHAAN
                </th>
                <th class="col-2">
                    ACTION
                </th>
        
                <tbody>
                    @foreach ($posisi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_posisi }}</td>
                        {{-- <td> <img src="{{ asset('storage/' . $item->foto_perusahaan) }}" height="30" width="30" alt=""> </td> --}}
                        <td>{{ $item->deadline_posisi }}</td>
                        <td>{{ $item->nama_perusahaan }}</td>
                        {{-- <td>
                            @if ( $item->surat_perusahaan == null  )
                            <span class="badge bg-warning text-dark">Belum Lengkap</span>
                                
                            @elseif ( $item->deskripsi_perusahaan = null )
                            <span class="badge bg-warning text-dark">Belum Lengkap</span>
                                
                            @else
                            <span class="badge bg-success ">Bisa Direview</span>
                                
                            @endif
                        </td> --}}
                        <td>
                            <a href="/admin/posisimagang/show{{ $item->id }}/{{ $item->perusahaan_id }}" style="text-decoration:none" class="badge bg-info"><i class="bi bi-eye d-inline" style="font-size: 1.5rem"></i></a>
                            {{-- <a href="/dashboard/posisi/{{ $item->id }}/edit" style="text-decoration:none" class="badge bg-primary mt-2"><i class="bi bi-pencil-square d-inline" style="font-size: 1.5rem"></i></a> --}}
                            {{-- <form action="/dashboard/posisi/{{ $item->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger mt-2 border-0" onclick="return confirm('Data Akan terhapus')"><i class="bi bi-trash" style="font-size: 1.5rem"></i></button>
                            </form> --}}
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class=" d-flex justify-content-center">{{ $posisi->links() }}</div>
        {{-- {{ $proses }} --}}
    </div>
    {{-- {{ $posisi}} --}}
    
    {{-- <h4>{{ Auth::guard('admin')->user() }}</h4> --}}
    @endsection