<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?= $this->session->userdata('message'); ?>
            <?= $this->session->unset_userdata('message'); ?>
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold float-start text-primary"><?= $title; ?></h6>
                    <button type="button" class="btn btn-primary m-0 float-end tambahBarang" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-fw fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <h4 class="float-left">Result: <?= $total_rows; ?></h4>
                    <!-- Topbar Search -->
                    <form action="" method="post" class="d-sm-inline-block form-inline float-right mb-4 mw-100">
                        <div class="input-group">
                            <input type="text" id="keyword" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id Barang</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($barang)) : ?>
                                    <tr>
                                        <td colspan="5" align="center">
                                            <p>Tidak ada data</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php foreach ($barang as $b) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$start; ?></th>
                                        <td>
                                            <?= $b['id_barang']; ?>
                                        </td>
                                        <td>
                                            <?= $b['nama']; ?>
                                        </td>
                                        <td>
                                            <?= $b['kategori']; ?>
                                        </td>
                                        <td>
                                            <?php

                                            if ($b['status'] == 1) {
                                                echo 'Dalam Loker';
                                            } elseif ($b['status'] == 2) {
                                                echo 'Sedang Dipinjam';
                                            }

                                            ?>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-primary btn-sm editBarang" data-toggle="modal" data-target="#tambah" data-id="<?= $b['id']; ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('user/hapusBarang/') . $b['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus '+ '<?= $b['nama']; ?>');"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                <?php endforeach;  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?= $this->pagination->create_links(); ?>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="editBarangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBarangLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('user/tambah_barang'); ?>">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_barang" id="id_barang">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">Select Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option><?= $k['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>