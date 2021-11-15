@extends('dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome  {{ Auth::guard('perusahaan')->user()->nama_perusahaan }}
    
   
    
    </h1>
</div>
{{-- <h4>{{ Auth::guard('perusahaan')->user() }}</h4> --}}
@endsection