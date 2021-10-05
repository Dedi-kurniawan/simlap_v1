<ul class="menu-nav">
    <li class="menu-section">
        <h4 class="menu-text">DASHBOARD</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item {{ (request()->is('admin/sd/dashboard')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.sd.dashboard') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="far fa-chart-bar {{ (request()->is('admin/sd/dashboard')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Dashboard</span>
        </a>
    </li>
    <li class="menu-section">
        <h4 class="menu-text">MAIN MENU</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item {{ (request()->is('admin/master/sekolah')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.master.sekolah.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-building {{ (request()->is('admin/master/sekolah')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Sekolah</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('admin/sd/tenaga-pendidik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.sd.tenaga-pendidik') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-chalkboard-teacher {{ (request()->is('admin/sd/tenaga-pendidik')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Tenaga Pendidik</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('admin/sd/tenaga-kependidikan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.sd.tenaga-kependidikan') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-user-friends {{ (request()->is('admin/sd/tenaga-kependidikan')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Tenaga Kependidikan</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('admin/sd/kebutuhan-guru')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.sd.kebutuhan-guru') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-users-cog {{ (request()->is('admin/sd/kebutuhan-guru')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Analisis Kebutuhan Guru</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('admin/sd/peserta-didik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.sd.peserta-didik') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-users {{ (request()->is('admin/sd/peserta-didik')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Peserta Didik</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('admin/sd/sarana-prasarana')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.sd.sarana-prasarana') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-building {{ (request()->is('admin/sd/sarana-prasarana')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Sarana & Prasarana</span>
        </a>
    </li>
    <li class="menu-item menu-item-submenu {{ (request()->is('admin/master/kelas-siswa', 'admin/master/mata-pelajaran', 'admin/master/fasilitas', 'admin/master/koordinator', 'admin/master/jabatan', 'admin/master/pangkat', 'admin/master/kecamatan', 'admin/master/desa', 'admin/master/jurusan')) ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="svg-icon menu-icon">
                <i class="fa fa-database"></i>
            </span>
            <span class="menu-text">Master</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link">
                        <span class="menu-text">Master</span>
                    </span>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/kelas-siswa')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.kelas-siswa.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/kelas-siswa')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Kelas</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/mata-pelajaran')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.mata-pelajaran.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/mata-pelajaran')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Mata Pelajaran</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/fasilitas')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.fasilitas.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/fasilitas')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Uraian/Fasilitas</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/koordinator')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.koordinator.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/koordinator')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Koordinator</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/jabatan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.jabatan.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/jabatan')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Jabatan</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/pangkat')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.pangkat.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/pangkat')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Pangkat</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/jurusan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.jurusan.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/jurusan')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Jurusan</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/kecamatan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.kecamatan.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/kecamatan')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Kecamatan</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/master/desa')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.master.desa.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/master/desa')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Desa</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="menu-section">
        <h4 class="menu-text">LAPORAN</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item {{ (request()->is('admin/pengaturan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.pengaturan.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-cog {{ (request()->is('admin/pengaturan')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Pengaturan</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('admin/sd/laporan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.sd.laporan') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-file-alt {{ (request()->is('admin/sd/laporan')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Laporan</span>
        </a>
    </li>
    <li class="menu-section">
        <h4 class="menu-text">MANAJEMEN AKUN</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item {{ (request()->is('admin/akun')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.akun.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-unlock {{ (request()->is('admin/akun')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">AKUN</span>
        </a>
    </li>
                 
</ul>