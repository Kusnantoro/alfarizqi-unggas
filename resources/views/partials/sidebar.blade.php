<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('kelola*') ? 'active' : '' }}">
            <a class="nav-link" href="/kelola">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Kelola Poin Pelanggan</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('tambah*') ? 'active' : '' }}">
            <a class="nav-link" href="/tambah">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Tambah Poin Pelanggan</span>
            </a>
        </li>
    </ul>
</nav>