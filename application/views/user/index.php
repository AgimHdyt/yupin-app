<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Peminjam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->User_model->peminjam(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->User_model->countBarang(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Dipinjam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->User_model->getBarangDipinjam(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-people-carry fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Dalam Loker</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->User_model->getBarangSisa(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Approach -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2 class="m-0 font-weight-bold">Selamat Datang</h2><br>
            <p>Anda masuk sebagai <strong> Agim Hidayat</strong>
                <br>
                Pada halaman admin, Anda dapat menambah kategori barang,
                mengelola barang, menambah data siswa, meminjam dan mengembalika.
            </p>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->