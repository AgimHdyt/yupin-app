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

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold float-start text-primary"><?= $title; ?></h6>
                    <button type="button" class="btn btn-primary m-0 float-end tambahUser" data-toggle="modal" data-target="#tambahUser">
                        <i class="fas fa-fw fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Nama Lenhkap</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if ($users) : ?>
                                    <?php foreach ($users as $s) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $s['username']; ?></td>
                                            <td><?= $s['nama']; ?></td>
                                            <td>
                                                <?php if ($s['role'] == 1) {
                                                    echo 'Supper Admin';
                                                } else {
                                                    echo 'Admin';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm editUser" data-toggle="modal" data-target="#editUser" data-id="<?= $s['id']; ?>"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/hapusUser/') . $s['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus: '+ '<?= $s['nama']; ?>');"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="user" method="post" action="">
                    <div class="form-group">
                        <select class="form-control form-control" id="level" name="level">
                            <option value="">Level</option>
                            <option value="1">Supper Admin</option>
                            <option value="2">Admin</option>
                        </select>
                        <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="user" method="post" action="<?= base_url('admin/register'); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control" id="username" name="username" placeholder="Username">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control" id="level" name="level">
                            <option value="">Level</option>
                            <option value="1">Supper Admin</option>
                            <option value="2">Admin</option>
                        </select>
                        <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control" id="password2" name="password2" placeholder="Repeat Password">
                        </div>
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