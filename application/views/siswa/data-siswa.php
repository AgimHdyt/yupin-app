<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?= $this->session->userdata('message'); ?>
            <?= $this->session->unset_userdata('message'); ?>

            <!-- <a href="" class="btn btn-primary mb-3 addNewMenu" data-toggle="modal" data-target="#tambah">Add New Submenu</a> -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold float-start text-primary"><?= $title; ?></h6>
                    <button type="button" class="btn btn-primary m-0 float-end tambahSiswa" data-toggle="modal" data-target="#tambahSiswa">
                        <i class="fas fa-fw fa-plus"></i>
                    </button>
                </div>
                <!-- Topbar Search -->
                <form action="" method="post" class="d-none d-sm-inline-block form-inline ml-auto mt-3 mr-md-3 my-2 md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" id="keyword" name="keyword" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search">
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
                                    <th>Nisn</th>
                                    <th>Nama Lenhkap</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if ($siswa) : ?>
                                    <?php foreach ($siswa as $s) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $s['nisn']; ?></td>
                                            <td><?= $s['nama']; ?></td>
                                            <td><?= $s['kelas']; ?></td>
                                            <td><?= $s['jurusan']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm editSiswa" data-toggle="modal" data-target="#tambahSiswa" data-id="<?= $s['id']; ?>"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('siswa/hapusSiswa/') . $s['id'] . '?kelas=' . $s['kelas'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus: '+ '<?= $s['nama']; ?>');"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td align="center" colspan="6">
                                            <p>Tidak Ada Data</p>
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
<div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="editSiswaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSiswaLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('siswa/dataSiswa/10'); ?>">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Nisn">
                        <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                            <option value="">Kelas</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select type="text" class="form-control" id="jurusan" name="jurusan">
                            <option value="">Jurusan</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Multi Media">Multi Media</option>
                        </select>
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
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