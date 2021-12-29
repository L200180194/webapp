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
    <div class="shadow p-3 mb-3 bg-body rounded">
        <h5>DAFTAR ADMIN</h5>
    </div>
    <div class="shadow p-3 mb-3 bg-body rounded mt-3">
        <nav class="nav nav-pills nav-justified ">
            <a class="nav-link active" aria-current="page" href="/admin/admins">Aktif</a>
            <a class="nav-link" href="/admin/admin/berhenti">Berhenti</a>
        </nav>
    </div>
    <div class="shadow p-3 mb-5 bg-body rounded ">
        
        <div class="table-responsive">
            <div class="row mb-3 mt-3">
                <div class="col">
                    <form action="/admin/admins">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                            <button class="btn btn-info text-white" type="submit" > Search</button>
                        </div>
                    </form>
                </div>
                <div class="col">
                    @if ( Auth::guard('admin')->user()->level == 'superadmin')
                    <a href="/admin/admins/create" class="btn btn-primary mb-2">Tambah Admin</a>
                    @endif
                </div>
            </div>
            <table class="table align-middle">
        
                <th>
                    NO
                </th>
                <th>
                    NAMA ADMIN
                </th>
                <th>
                    NO TELEPON
                </th>
                <th>
                    EMAIL
                </th>
                <th>
                    ALAMAT 
                </th>
                <th>
                    LEVEL 
                </th>
                {{-- <th>
                    Kelengkapan
                </th> --}}
                @if (Auth::guard('admin')->user()->level=='superadmin')
                <th >
                    ACTION
                </th>
                @endif
                
                <tbody>
                    @foreach ($admin as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_admin }}</td>
                        {{-- <td> <img src="{{ asset('storage/' . $item->foto_perusahaan) }}" height="30" width="30" alt=""> </td> --}}
                        <td>{{ $item->tlp_admin }}</td>
                        <td>
                            {{ $item->email }}</td>
                        <td>
                        
                            {{ $item->alamat_admin }}
                        </td>
                        <td>
                        
                            {{ $item->level }}
                        </td>
                        @if (Auth::guard('admin')->user()->level=='superadmin')
                        <td>
                            {{-- <a href="" style="text-decoration:none" class="badge bg-info"><i class="bi bi-eye d-inline" style="font-size: 1.5rem"></i></a> --}}
                            <a href="/admin/admins/{{ $item->id }}/edit" style="text-decoration:none" class="btn btn-primary badge bg-primary"><i class="bi bi-pencil-square d-inline" style="font-size: 1.5rem"></i></a>
                            {{-- <form action="/dashboard/posisi/{{ $item->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger mt-2 border-0" onclick="return confirm('Data Akan terhapus')"><i class="bi bi-trash" style="font-size: 1.5rem"></i></button>
                            </form> --}}
                            
                        </td>
                        @endif
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class=" d-flex justify-content-center mt-1">{{ $admin->links() }}</div>
        {{-- {{ $proses }} --}}
    </div>
    {{-- {{ $admin }} --}}
    {{-- <h4>{{ Auth::guard('admin')->user() }}</h4> --}}
    @endsection