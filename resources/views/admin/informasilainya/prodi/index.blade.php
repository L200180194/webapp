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
{{-- {{ dd($pendidikan) }} --}}
<div class="container-md mt-5 ">
    <div class=" justify-content-center mb-3">
        <div class="shadow p-3   bg-body rounded "><h5>Program Studi</h5></div>
    </div>
    <div class="shadow p-3 mb-5 bg-body rounded mt-3">
        <div>
            <a href="/admin/informasilainya/prodi/create" class="btn btn-primary mb-3">Tambah Program Studi</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <th>
                    NO
                </th>
                <th>
                    Program Studi
                </th>
                <th class="col-2">
                    ACTION
                </th>
        
                <tbody>
                    @foreach ($prodi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_prodi }}</td>
                        <td>
                            <a href="/admin/informasilainya/prodi/{{ $item->id }}/edit" style="text-decoration:none" class=" badge bg-primary"><i class="bi bi-pencil-square d-inline" style="font-size: 1.5rem"></i></a>
                            
                            <form action="/admin/informasilainya/prodi/{{ $item->id }}" method="POST" class="d-inline">
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
        {{-- <div class=" d-flex justify-content-center">{{ $posisi->links() }}</div> --}}
        {{-- {{ $proses }} --}}
    </div>

@endsection