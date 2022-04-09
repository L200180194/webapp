<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block mt-3 sidebar collapse">
        <ul class="nav  flex-column">
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('admin')?'active':'' }} " aria-current="page" href="/admin">
                    <i class="bi bi-house-door " style="font-size: 1.3rem; "></i>
                    Home 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/posisimagang*')?'active':'' }}" href="/admin/posisimagang">
                    
                    <i class="bi bi-journal-text"style="font-size: 1.3rem; "></i>
                    Posisi Magang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/admins*')?'active':'' }} " href="/admin/admins">
                    
                    <i class="bi bi-people-fill" style="font-size: 1.3rem; "></i>
                    Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/perusahaan*')?'active':'' }} " aria-current="page" href="/admin/perusahaan">
                    <i class="bi bi-building " style="font-size: 1.3rem; "></i>
                    Perusahaan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/informasilainya*')?'active':'' }} " aria-current="page" href="/admin/informasilainya">
                    <i class="bi bi-info-lg " style="font-size: 1.3rem; "></i>
                    Informasi Lainya
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/profiladmin*')?'active':'' }}  " aria-current="page" href="/admin/profiladmin">
                    <i class="bi bi-file-earmark-person " style="font-size: 1.3rem; "></i>
                    Profil
                </a>
            </li>
        </ul>
    </div>
</nav>
