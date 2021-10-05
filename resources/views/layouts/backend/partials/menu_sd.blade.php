<ul class="menu-nav">
    <li class="menu-section">
        <h4 class="menu-text">DASHBOARD</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item {{ (request()->is('sd/dashboard')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('sd.dashboard') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="far fa-chart-bar {{ (request()->is('sd/dashboard')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Dashboard</span>
        </a>
    </li>
    <li class="menu-section">
        <h4 class="menu-text">MAIN MENU</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item {{ (request()->is('m/sekolah')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('m.sekolah') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-home {{ (request()->is('m/sekolah')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Sekolah</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('sd/tenaga-pendidik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('sd.tenaga-pendidik.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-chalkboard-teacher {{ (request()->is('sd/tenaga-pendidik')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Tenaga Pendidik</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('sd/tenaga-kependidikan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('sd.tenaga-kependidikan.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fa fa-user-friends {{ (request()->is('sd/tenaga-kependidikan')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Tenaga Kependidikan</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('sd/kebutuhan-guru')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('sd.kebutuhan-guru.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-users-cog {{ (request()->is('sd/kebutuhan-guru')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Analisis Kebutuhan Guru</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('sd/peserta-didik')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('sd.peserta-didik.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-users {{ (request()->is('sd/peserta-didik')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Peserta Didik</span>
        </a>
    </li>
    <li class="menu-item {{ (request()->is('sd/sarana-prasarana')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('sd.sarana-prasarana.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-building {{ (request()->is('sd/sarana-prasarana')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Sarana & Prasarana</span>
        </a>
    </li>
    <li class="menu-section">
        <h4 class="menu-text">LAPORAN</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    <li class="menu-item {{ (request()->is('sd/laporan')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
        <a href="{{ route('sd.laporan.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <i class="fas fa-file-alt {{ (request()->is('sd/laporan')) ? 'text-primary' : '' }}"></i>
            </span>
            <span class="menu-text">Laporan</span>
        </a>
    </li>
                 
</ul>