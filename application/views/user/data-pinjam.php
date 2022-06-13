<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->userdata('message'); ?>
            <?= $this->session->unset_userdata('message'); ?>

            <!-- <a href="" class="btn btn-primary mb-3 addNewMenu" data-toggle="modal" data-target="#tambah">Add New Submenu</a> -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <!-- Topbar Search -->
                <form action="<?= base_url('user/datapinjam') ?>" method="post" class="d-none d-sm-inline-block form-inline ml-auto mt-3 mr-md-3 my-2 md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Peminjam</th>
                                    <th>Pinjaman</th>
                                    <th>Tanggal Pinjam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($datapinjam) : ?>
                                    <?php foreach ($datapinjam as $dp) : ?>
                                        <tr>
                                            <th scope="row"><?= ++$start; ?></th>
                                            <td>
                                                <div style="float: left; margin-right: 5px;">
                                                    Nama <br>
                                                    Kelas <br>
                                                    Jurusan <br>
                                                </div>
                                                <div style="float: left; margin-right: 5px;">
                                                    : <br>
                                                    : <br>
                                                    : <br>
                                                </div>
                                                <div>
                                                    <?= $dp['nama_peminjam']; ?><br>
                                                    <?= $dp['kelas']; ?><br>
                                                    <?= $dp['jurusan']; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                $barang = $this->db->get_where('barang', ['status' => 2, 'id_barang' => $dp['id_barang']])->row_array();
                                                ?>
                                                <div style="float: left; margin-right: 5px;">
                                                    ID Barang <br>
                                                    Nama <br>
                                                    Kategori <br>
                                                </div>
                                                <div style="float: left; margin-right: 5px;">
                                                    : <br>
                                                    : <br>
                                                    : <br>
                                                </div>
                                                <div style="float: left;">
                                                    <?= $dp['id_barang']; ?><br>
                                                    <?= $barang['nama']; ?><br>
                                                    <?= $barang['kategori']; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?= date("d F Y", $dp['date_pinjam']); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;  ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6" align="center">
                                            <p>Tidak ada data</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengembalian</h6>
                </div>
                <div class="card-body">
                    <?= $this->session->userdata('message'); ?>
                    <?= $this->session->unset_userdata('message'); ?>

                    <form method="post" action="<?= base_url('user/kembalikan'); ?>">
                        <div class="input-group">
                            <select class="form-control" id="id_barang" name="id_barang" placeholder="ID Barang">
                                <option value="">Nama Barang</option>
                                <?php foreach ($dipinjam as $dm) : ?>
                                    <option value="<?= $dm['id_barang']; ?>"><?= $dm['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" type="button">
                                    Kembalikan
                                </button>
                            </div>
                            <?= form_error('id_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?= $this->pagination->create_links(); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->