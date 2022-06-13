<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-5">

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
                    <h6 class="m-0 font-weight-bold float-start text-primary"><?= $title; ?></h6>
                    <button type="button" class="btn btn-primary m-0 float-end tambahKategori" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-fw fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($kategori) : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kategori as $k) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td>
                                                <?= $k['nama']; ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm editKategori" data-toggle="modal" data-target="#tambah" data-id="<?= $k['id']; ?>"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('user/hapusKategori/') . $k['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus '+ '<?= $k['nama']; ?>');"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach;  ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" align="center">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('user/tambah_kategori'); ?>">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kategori">
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