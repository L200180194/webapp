<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard')?'active':'' }}" aria-current="page" href="/dashboard">
                    <i class="bi bi-house-door " style="font-size: 1.3rem; "></i>
                    Home 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posisi')?'active':'' }}" href="/dashboard/posisi">
                    {{-- <span data-feather="file"></span> --}}
                    <i class="bi bi-journal-text"style="font-size: 1.3rem; "></i>
                    Posisi Magang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard')?'active':'' }}" href="#">
                    {{-- <span data-feather="shopping-cart"></span> --}}
                    <i class="bi bi-file-earmark-person" style="font-size: 1.3rem; "></i>
                    Pendaftaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard')?'active':'' }} " aria-current="page" href="#">
                    <i class="bi bi-building " style="font-size: 1.3rem; "></i>
                    Profil
                </a>
            </li>
        </ul>
    </div>
</nav>