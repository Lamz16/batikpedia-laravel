<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <div class="badge badge-danger">new</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="typcn typcn-document-add menu-icon"></i>
                <span class="menu-title">Form Tambah</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.forms.add-katalog')}}">Tambah Katalog Batik</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.forms.add-provinsi')}}">Tambah Provinsi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.forms.add-berita')}}">Tambah Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.forms.add-wisata')}}">Tambah Wisata</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.forms.add-katalog')}}">Tambah Video Batik</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.forms.add-katalog')}}">Tambah Kursus Batik</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.forms.add-rekomendasi')}}">Tambah Rekomendasi</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
