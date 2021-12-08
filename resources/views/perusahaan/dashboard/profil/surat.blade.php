@extends('perusahaan.dashboard.layoutsdashboard.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Surat Perusahaan
    </h1>
</div>
<div>
    <embed  class="embedres" src="{{asset('storage/' . Auth::guard('perusahaan')->user()->surat_perusahaan )}}" type="application/pdf" width="600" height="800">
</div>
@endsection
