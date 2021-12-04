@extends('dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pendaftar
    </h1>
</div>
{{ $daftar }}
{{-- <h4>{{ Auth::guard('perusahaan')->user() }}</h4> --}}
{{-- <table>
    <thead>
        <tr>
            <th>posisi magang</th>
            <th>user</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendaftars as $item)
            <tr>
                <td>{{ $item->nama_posisi }}</td>
                <td>
                    <ul>
                        @foreach ($item->users as $us)
                            <li>{{ $us->name }} ({{ $us->pivot->tgl_daftar }})</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> --}}
<div class="container my-9 mb-5">
    <div class="row text-center mt-5">
        <h1>{{ $daftar->nama_posisi }}</h1>
    </div>
    <div class="row">
        <div class="rounded mx-auto d-block text-center mt-3 ">
            <img src="{{ asset('storage/' . $daftar->foto_posisi) }}" class="img-thumbnail img-fluid" alt="..." width="400px" height="40px">
        </div>
    </div>
    <div class="row-md mt-3">
        <h3>Persyaratan</h3>
        <div class="container fs-5">
            {!! $daftar->persyaratan_posisi !!}
        </div>
    </div>
    <div class="row-md mt-3">
        <h3>Keterangan</h3>
        <div class="container fs-5">
            {!! $daftar->keterangan_posisi !!}
        </div>
    </div>
    <div class="row-md mt-3">
        <h3>fasilitas</h3>
        <div class="container fs-5">
            {!! $daftar->fasilitas_posisi !!}
        </div>
    </div>
    <div class="row-md mt-3">
        <h3>Deskripsi</h3>
        <div class="container fs-5">
            {!! $daftar->deskripsi_posisi !!}
        </div>
    </div>
    <div class="row-md mt-3 ">
        <h3>Deadline</h3>
        <div class="container fs-5">
            {{  $daftar->deadline_posisi  }}
        </div>
    </div>
</div>
<div class="table-responsive mb-5">
    <table class="table  align-middle table-hover">

        <th>
            NO
        </th>
        <th>
            NAMA PENDAFTAR
        </th>
        <th>
            FOTO
        </th>
        
        <th>
            ALAMAT
        </th>
        <th>
            STATUS
        </th>
        <th>
            ACTION
        </th>

        <tbody>
            @foreach ($daftar->users as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td> <img src="{{ asset('storage/' . $item->foto_user) }}" height="30" width="30" alt=""> </td>
                
                <td>{{ $item->alamat_user }}</td>
                <td>
                    {{-- {{ $item->pivot->status_daftar }} --}}
                    @if ($item->pivot->status_daftar == 'proses' )
                    <div class="col fs-6"><span class="badge bg-warning text-dark">Proses</span></div>

                    @elseif ($item->pivot->status_daftar == 'Diterima')
                    <div class="col fs-6"><span class="badge bg-success">Diterima</span></div>

                    @elseif ($item->pivot->status_daftar == 'Ditolak')
                    <div class="col fs-6"><span class="badge bg-danger">Ditolak</span></div>

                    @endif
                </td>
                
                <td>
                    <a href="/dashboard/pendaftar/detail/{{ $item->id }}/{{ $item->pivot->id }}" class="badge bg-primary mt-2"><i class="bi bi-pencil-square" style="font-size: 1.5rem"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection