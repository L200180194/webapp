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
<div class="shadow p-3 mb-5 bg-body rounded mt-3">
    <nav class="nav nav-pills nav-justified ">
        <a class="nav-link "  href="/admin/perusahaan">Proses</a>
        <a class="nav-link "  href="/admin/perusahaan/diterima">Diterima</a>
        <a class="nav-link active" aria-current="page" href="/admin/perusahaan/ditolak">Ditolak</a>
    </nav>
</div>
<div class="shadow p-3 mb-5 bg-body rounded mt-3">
    <div class="table-responsive">
        <div class="col-6">
            <form action="/admin/perusahaan/diterima">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-info text-white" type="submit" > Search</button>
                </div>
            </form>
        </div>
        <table class="table align-middle">
    
            <th>
                NO
            </th>
            <th>
                NAMA PERUSAHAAN
            </th>
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
                    <td>{{ $item->status_perusahaan }}</td>
                    <td>
                        <a href="/admin/perusahaan/detail{{ $item->id }}" style="text-decoration:none" class="badge bg-info"><i class="bi bi-eye d-inline" style="font-size: 1.5rem"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class=" d-flex justify-content-center mt-1">{{ $proses->links() }}</div>
    </div>
    {{-- {{ $proses }} --}}
</div>
    {{-- <h4>{{ Auth::guard('admin')->user() }}</h4> --}}
    @endsection