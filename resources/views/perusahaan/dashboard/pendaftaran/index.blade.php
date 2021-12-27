@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')

<div class="shadow-lg p-3 mt-3  bg-body rounded  mb-3"><h5>PENDAFTAR</h5></div>
{{-- {{ $pendaftars }} --}}
{{-- <h4>{{ Auth::guard('perusahaan')->user() }}</h4> --}}
<div class="shadow-lg p-3 mt-3  bg-body rounded  mb-3">
<div class="table-responsive">
    <div class="col-6">
        <form action="/dashboard/pendaftar">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-info text-white" type="submit" > Search</button>
            </div>
        </form>
    </div>
    <table class="table  align-middle table-hover">

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
            DEADLINE
        </th>
        {{-- <th>
            CREATED AT
        </th> --}}
        <th>
            ACTION
        </th>

        <tbody>
            @foreach ($pendaftars as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_posisi }}</td>
                <td> <img src="{{ asset('storage/' . $item->foto_posisi) }}" height="30" width="30" alt=""> </td>
                
                <td>{{ $item->deadline_posisi }}</td>
                
                <td>
                    <a href="/dashboard/pendaftar/{{ $item->id }}" class="btn btn-primary"><i class="bi bi-eye" > </i> Lihat Pendaftar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class=" d-flex justify-content-center">{{ $pendaftars->links() }}</div>
</div>
@endsection