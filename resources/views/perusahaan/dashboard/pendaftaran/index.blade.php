@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pendaftar
    </h1>
</div>
{{-- {{ $pendaftars }} --}}
{{-- <h4>{{ Auth::guard('perusahaan')->user() }}</h4> --}}
<div class="table-responsive">
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
@endsection