<ul class="menu-nav">
    <li class="menu-section">
        <h4 class="menu-text">DASHBOARD</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item {{ (request()->is('superadmin/dashboard')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('superadmin.dashboard') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="far fa-chart-bar {{ (request()->is('superadmin/dashboard')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Dashboard</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('admin/master/sekolah')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('admin.master.sekolah.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="far fa-building {{ (request()->is('admin/master/sekolah')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Sekolah</span>
        </a>
    </li>
    <li class="menu-section">
        <h4 class="menu-text">MAIN MENU</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item menu-item-submenu {{ (request()->is('admin/smp*')) ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="svg-icon menu-icon">
                <i class="fab fa-black-tie text-primary"></i>
            </span>
            <span class="menu-text">SMP</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link">
                        <span class="menu-text">SMP</span>
                    </span>
                </li>
                <li class="menu-item {{ (request()->is('admin/smp/tenaga-pendidik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.smp.tenaga-pendidik') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/smp/tenaga-pendidik')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Tenaga Pendidik</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/smp/tenaga-kependidikan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.smp.tenaga-kependidikan') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/smp/tenaga-kependidikan')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Tenaga Kependidikan</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/smp/kebutuhan-guru')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.smp.kebutuhan-guru') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/smp/kebutuhan-guru')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Analisis Kebutuhan Guru</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/smp/peserta-didik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.smp.peserta-didik') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/smp/peserta-didik')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Peserta Didik</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/smp/sarana-prasarana')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.smp.sarana-prasarana') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/smp/sarana-prasarana')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Sarana & Prasarana</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="menu-item menu-item-submenu {{ (request()->is('admin/sd*')) ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="svg-icon menu-icon">
                <i class="fas fa-street-view text-danger"></i>
            </span>
            <span class="menu-text">SD</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link">
                        <span class="menu-text">SD</span>
                    </span>
                </li>
                <li class="menu-item {{ (request()->is('admin/sd/tenaga-pendidik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.sd.tenaga-pendidik') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/sd/tenaga-pendidik')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Tenaga Pendidik</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/sd/tenaga-kependidikan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.sd.tenaga-kependidikan') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/sd/tenaga-kependidikan')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Tenaga Kependidikan</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/sd/kebutuhan-guru')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.sd.kebutuhan-guru') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/sd/kebutuhan-guru')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Analisis Kebutuhan Guru</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/sd/peserta-didik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.sd.peserta-didik') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/sd/peserta-didik')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Peserta Didik</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/sd/sarana-prasarana')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.sd.sarana-prasarana') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/sd/sarana-prasarana')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Sarana & Prasarana</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="menu-item menu-item-submenu {{ (request()->is('admin/paud*')) ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="svg-icon menu-icon">
                <i class="fas fa-child text-info"></i>
            </span>
            <span class="menu-text">PAUD</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link">
                        <span class="menu-text">PAUD</span>
                    </span>
                </li>
                <li class="menu-item {{ (request()->is('admin/paud/tenaga-pendidik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.paud.tenaga-pendidik') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/paud/tenaga-pendidik')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Tenaga Pendidik</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/paud/tenaga-kependidikan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.paud.tenaga-kependidikan') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/paud/tenaga-kependidikan')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Tenaga Kependidikan</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/paud/kebutuhan-guru')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.paud.kebutuhan-guru') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/paud/kebutuhan-guru')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Analisis Kebutuhan Guru</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/paud/peserta-didik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.paud.peserta-didik') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/paud/peserta-didik')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Peserta Didik</span>
                    </a>
                </li>
                <li class="menu-item {{ (request()->is('admin/paud/sarana-prasarana')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.paud.sarana-prasarana') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot {{ (request()->is('admin/paud/sarana-prasarana')) ? 'text-primary' : '' }}">
                            <span></span>
                        </i>
                        <span class="menu-text">Sarana & Prasarana</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="menu-section">
        <h4 class="menu-text">MASTER</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
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
    <li class="menu-item {{ (request()->is('superadmin/laporan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('superadmin.laporan') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-file-alt {{ (request()->is('superadmin/laporan')) ? 'text-primary' : '' }}"></i>
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