@extends('admin.layoutsdashboard.main')
@section('container')
{{-- {{ dd($pendidikan) }} --}}
<div class="container-md mt-5 ">
    <div class=" justify-content-center mb-3">
        <div class="shadow p-3   bg-body rounded "><h5>Pendidikan</h5></div>
    </div>
    <div class="shadow p-3 mb-5 bg-body rounded mt-3">
        {{-- <div class="col-6 my-3">
            <form action="/admin/posisimagang">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-info text-white" type="submit" > Search</button>
                </div>
            </form>
        </div> --}}
        <div class="table-responsive">
            <table class="table align-middle">
        
                <th>
                    NO
                </th>
                <th>
                    Jenjang Pendidikan
                </th>
                <th class="col-2">
                    ACTION
                </th>
        
                <tbody>
                    @foreach ($pendidikan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tingkat_pendidikan }}</td>
                        <td>
                            <a href="" style="text-decoration:none" class="badge bg-info"><i class="bi bi-eye d-inline" style="font-size: 1.5rem"></i></a>
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
        {{-- <div class=" d-flex justify-content-center">{{ $posisi->links() }}</div> --}}
        {{-- {{ $proses }} --}}
    </div>

@endsection