<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row mb-5">
        <div class="col-lg-6 offset-3">

            <?= $this->session->userdata('message'); ?>
            <?= $this->session->unset_userdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="<?= base_url('user/pinjam'); ?>">
                            <div class="form-group">
                                <select class="form-control kelas" id="kelas" name="kelas">
                                    <option value="">Kelas</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <select class="form-control jurusan" id="jurusan" name="jurusan">
                                    <option value="">Jurusan</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Multi Media">Multi Media</option>
                                </select>
                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <select class="form-control nama" id="nama_peminjam" name="nama_peminjam">
                                    <option value="">Nama</option>
                                    <?php foreach ($siswa as $s) : ?>
                                        <option value="<?= $s['nama']; ?>"><?= $s['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="input-group w-50 mt-5">
        <select class="form-control" id="id_barang" name="id_barang">
            <option value="">Nama Barang</option>
            <?php foreach ($barang as $b) : ?>
                <option value="<?= $b['id_barang']; ?>"><?= $b['nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <!-- <input type="text" class="form-control" id="id_barang" name="id_barang"> -->
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary" type="button">
                Pinjam
            </button>
        </div>
    </div>
    <?= form_error('id_barang', '<small class="text-danger pl-3">', '</small>'); ?>
    </form>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->