<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa fa-snowflake-o"></i> -->
            <img src="<?= base_url('assets/') ?>img/logo.jpg" alt="" style="height: 60px;">
        </div>
        <div class="sidebar-brand-text mx-3">Laundry OfResh</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa fa-area-chart"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Service
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('konsumen'); ?>">
            <i class="fa fa-address-book"></i>
            <span>konsumen</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('paket'); ?>">
            <i class="fa fa-database"></i>
            <span>Data Paket</span></a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
                Transaksi
            </div> -->

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('transaksi'); ?>">
            <i class="fas fa-fw fa-dollar"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('transaksi/riwayat'); ?>">
            <i class="fas fa-fw fa-dollar"></i>
            <span>Riwayat Transaksi</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout');  ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa fa-mail-reply-all"></i>
            <span>Log Out</span></a>
    </li>

    <!-- Divider -->
    <hr class=" sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->