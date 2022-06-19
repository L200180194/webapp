@extends('layouts.main')
@section('body')
<div class="container shadow-lg p-3 mt-3 mb-5 bg-body rounded">
    <div class="container d-flex justify-content-center">
        <div class="col text-center">

            <h3>MyIntern Profile</h3>
            <img src="{{url('/images/myintern.png')}}" class="img-fluid" style="max-width: 30%;" alt="...">
            <div class="m-2">
                <p>Internship atau yang biasa kita sebut magang ataupun praktik kerja nyata biasanya menjadi kegiatan wajib yang harus dilakukan oleh mahasiswa untuk memenuhi mata kuliah yang disediakan oleh sebagian perguruan tinggi. Magang adalah sebuah kegiatan bagi mahasiswa untuk mengeksplorasi potensi diri dengan menerapkan ilmu yang sudah di pelajari dalam perkuliahan di lingkungan kerja sesungguhnya.</p>
                <p>Seperti persaingan untuk memperebutkan pekerjaan, persaingan untuk memperebutkan posisi magang pun terbilang cukup sulit. Saat ini mahasiswa sudah mulai sadar akan pentingnya pengalaman magang untuk nantinya mendaftar pekerjaan. Berbeda dengan lowongan pekerjaan yang saat ini sudah memiliki banyak platform untuk mencari informasi bahkan mendaftar seperti Indeed dan Jobstreet, untuk mendapatkan informasi mengenai pendaftaran magang cukup sulit. Hal ini disebabkan tidak adanya platform spesifik yang menampung informasi mengenai magang. Informasi-informasi mengenai magang saat ini masih tersebar di sosial media saja selain itu terkadang informasi yang disajikan tidak lengkap sehingga mengharuskan para mahasiswa maupun fresh graduate harus mencari lebih dalam lagi mengenai informasi tersebut.</p>
                <p class="fw-bold">MyIntern merupakan sebuah sistem informasi yang dirancang khusus untuk menghubungkan mahasiswa ataupun fresh graduate dengan perusahaan besar yang mencari resource untuk magang di perusahaan tersebut. Sistem informasi ini terbagi menjadi 2 platform yaitu web dan android. Web MyIntern ditujukan untuk perusahaan sedangkan aplikasi android ditujukan untuk para mahasiswa dan fresh graduate </p>
            </div>
        </div>
        
    </div>
    {{-- <h1 class="mx-auto">Halaman ABout</h1> --}}
    
</div>


@endsection