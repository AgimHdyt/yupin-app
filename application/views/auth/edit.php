<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Settings</h1>

    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->userdata('message'); ?>
            <?= $this->session->unset_userdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Change Username & Name</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="post" action="<?= base_url('auth/edit'); ?>">
                        <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control form-control" id="username" name="username" value="<?= $user['username']; ?>" disabled>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Edit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="post" action="<?= base_url('auth/editPassword'); ?>">
                        <div class="form-group">
                            <input type="password" class="form-control form-control" id="current_password" name="current_password" placeholder="Curren Password">
                            <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control" id="new_password1" name="new_password1" placeholder="New Password">
                            <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control" id="new_password2" name="new_password2" placeholder="Repeat Password">
                            <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Edit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->