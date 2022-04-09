@extends('admin.layoutsdashboard.main')
@section('container')
<div class="container px-2 " id="custom-cards">
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-2">
        <div class="col">
            <a href="/admin/informasilainya/pendidikan" style="text-decoration:none">
                <div class="card card-cover h-20 overflow-hidden text-white bg-success rounded-5 shadow-lg" style="min-height: 10rem;">
                    <div class="d-flex flex-column h-100 p-2 pb-3 text-white text-shadow-1">
                        {{-- <h5 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h5> --}}
                        <div class="row g-0">
                            <div class="col-sm-3 ">

                                <div class="mt-4 "><svg xmlns="http://www.w3.org/2000/svg" style="max-width: 5rem; min-height:3rem; min-width:3rem; max-height: 5rem; " fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                                    </svg>
                                </div>

                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <h5 class="card-title">Pendidikan</h5>
                                    <p class="card-text">Daftar Pendidikan </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="/admin/admins" style="text-decoration:none">
                <div class="card card-cover h-20 overflow-hidden text-white bg-danger rounded-5 shadow-lg" style="min-height: 10rem;">
                    <div class="d-flex flex-column h-100 p-2 pb-3 text-white text-shadow-1">
                        {{-- <h5 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h5> --}}
                        <div class="row g-0">
                            <div class="col-sm-3">
                                <div class="mt-4 "><svg xmlns="http://www.w3.org/2000/svg" style="max-width: 5rem; min-height:3rem; min-width:3rem; max-height: 5rem; " fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                    </svg></div>

                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <h5 class="card-title">Prodi</h5>
                                    <p class="card-text">Daftar Prodi </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>



        <div class="col">
            <a href="/admin/perusahaan" style="text-decoration:none">
                <div class="card card-cover h-20 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="min-height: 10rem;">
                    <div class="d-flex flex-column h-100 p-2 pb-3 text-white text-shadow-1">
                        {{-- <h5 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h5> --}}
                        <div class="row g-0">
                            <div class="col-sm-3">
                                <div class="mt-4 "> <svg xmlns="http://www.w3.org/2000/svg" style="max-width: 5rem; min-height:3rem; min-width:3rem; max-height: 5rem; " fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                                </svg></div>
                                {{-- <i class="bi bi-building" style="font-size: 4.5rem; "></i> --}}
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <h5 class="card-title">Skill</h5>
                                    <p class="card-text">Daftar Skill</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>



    </div>
</div>

@endsection