<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Yupin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php
    $role = $this->session->userdata('role');
    ?>
    <?php if ($role == 1) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">Supper Admin</div>

        <!-- Nav Item - Dashboard -->
        <li class="<?= activ($title, 'Dashboard'); ?>">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Nav Item - Dashboard -->
        <li class="<?= activ($title, 'Tambah User'); ?>">
            <a class="nav-link" href="<?= base_url('admin/register'); ?>">
                <i class="fas fa-fw fa-user-plus"></i>
                <span>Tambah User</span></a>
        </li>
    <?php else : ?>
        <!-- Heading -->
        <div class="sidebar-heading">Admin</div>
        <!-- Nav Item - Dashboard -->
        <li class="<?= activ($title, 'Dashboard'); ?>">
            <a class="nav-link" href="<?= base_url('user'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <?php if ($title == 'Kategori') : ?>
            <li class="<?= activ($title, 'Kategori'); ?>">
            <?php elseif ($title == 'Data Barang') : ?>
            <li class="<?= activ($title, 'Data Barang'); ?>">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-bars"></i>
                <span>Barang</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="<?= base_url('user/tambah_kategori'); ?>">Kategori</a>
                    <a class="collapse-item" href="<?= base_url('user/tambah_barang'); ?>">Data Barang</a>
                </div>
            </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if ($title == 'Data Siswa Kelas 10') : ?>
                <li class="<?= activ($title, 'Data Siswa Kelas 10'); ?>">
                <?php elseif ($title == 'Data Siswa Kelas 11') : ?>
                <li class="<?= activ($title, 'Data Siswa Kelas 11'); ?>">
                <?php elseif ($title == 'Data Siswa Kelas 12') : ?>
                <li class="<?= activ($title, 'Data Siswa Kelas 12'); ?>">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kelolasiswa" aria-expanded="true" aria-controls="kelolasiswa">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Siswa</span>
                </a>
                <div id="kelolasiswa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="<?= base_url('siswa/dataSiswa/10'); ?>">Kelas 10</a>
                        <a class="collapse-item" href="<?= base_url('siswa/dataSiswa/11'); ?>">Kelas 11</a>
                        <a class="collapse-item" href="<?= base_url('siswa/dataSiswa/12'); ?>">Kelas 12</a>
                    </div>
                </div>
                </li>

                <!-- Nav Item - Tables -->
                <li class="<?= activ($title, 'Pinjam Barang'); ?>">
                    <a class="nav-link" href="<?= base_url('user/pinjam') ?>">
                        <i class="fas fa-fw fa-people-carry"></i>
                        <span>Pinjam</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="<?= activ($title, 'Data Pinjam'); ?>">
                    <a class="nav-link" href="<?= base_url('user/datapinjam') ?>">
                        <i class="fas fa-fw fa-clipboard-list"></i>
                        <span>Data Pinjam</span></a>
                </li>
            <?php endif; ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

</ul>
<!-- End of Sidebar -->