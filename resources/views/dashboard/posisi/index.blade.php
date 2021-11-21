@extends('dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Posisi Magang
    </h1>
</div>
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
            <th>
                KETERANGAN
            </th>
            <th>
                FASILITAS
            </th>
            <th>
                DESKRIPSI
            </th>
            <th>
                DEADLINE
            </th>
            <th>
                CREATED AT
            </th>
            <th>
                ACTION
            </th>
        
        <tbody>
            @foreach ($posisis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_posisi }}</td>
                <td> <img src="{{ $item->foto_posisi }}" height="30" width="30" alt=""> </td>
                <td>{{ $item->persyaratan_posisi }}</td>
                <td>{{ $item->keterangan_posisi }}</td>
                <td>{{ $item->fasilitas_posisi}}</td>
                <td>{{ $item->deskripsi_posisi }}</td>
                <td>{{ $item->deadline_posisi }}</td>
                <td>{{ $item->created_at }}</td>
                <td></td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</div>
{{-- <h4>{{ Auth::guard('perusahaan')->user() }}</h4> --}}
@endsection