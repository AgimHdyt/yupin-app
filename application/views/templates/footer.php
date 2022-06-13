<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Yupin <?= date("Y", time()); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $(function() {
        $('.tambahSiswa').on('click', function() {
            $('#editSiswaLabel').html('Tambah Siswa');
            $('.modal-footer button[type=submit]').html('Tambah');
        });

        $('.editSiswa').on('click', function() {
            $('#editSiswaLabel').html('Edit Siswa');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('siswa/editSiswa'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('siswa/getSiswa') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#nisn').val(data.nisn);
                    $('#nama').val(data.nama);
                    $('#kelas').val(data.kelas);
                    $('#jurusan').val(data.jurusan);
                }

            });

        });
    });

    $(function() {
        $('.tambahBarang').on('click', function() {
            $('#editBarangLabel').html('Tambah Barang');
            $('.modal-footer button[type=submit]').html('Tambah');
        });

        $('.editBarang').on('click', function() {
            $('#editBarangLabel').html('Edit Barang');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('user/editBarang'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('user/getBarang') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#id_barang').val(data.id_barang);
                    $('#nama').val(data.nama);
                    $('#kategori').val(data.kategori);
                }

            });

        });
    });

    $(function() {
        $('.tambahKategori').on('click', function() {
            $('#editKategoriLabel').html('Tambah Kategori');
            $('.modal-footer button[type=submit]').html('Tambah');
        });

        $('.editKategori').on('click', function() {
            $('#editKategoriLabel').html('Edit Kategori');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('user/edit_kategori'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('user/getKategori') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#kategori').val(data.nama);
                }

            });

        });
    });

    $(function() {
        $('.editUser').on('click', function() {
            $('#editUserLabel').html('Edit User');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('admin/editUser'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('admin/getUser') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#level').val(data.role);
                }

            });

        });
    });

    $(function() {
        $('.jurusan').change(function() {
            var jurusan = $(this).val();
            var kelas = $('.kelas').val();

            $.ajax({
                url: "<?= base_url('user/getUserK') ?>",
                data: {
                    kelas: kelas,
                    jurusan: jurusan
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('.nama').html(data);
                }

            });

        });

        $('.kelas').change(function() {
            var kelas = $(this).val();
            var jurusan = $('.jurusan').val();

            $.ajax({
                url: "<?= base_url('user/getUserK') ?>",
                data: {
                    kelas: kelas,
                    jurusan: jurusan
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('.nama').html(data);
                }

            });

        });
    });

    // $(function() {

    //     $('.jurusan').change(function() {
    //         var kelas = $(this).val();

    //         $.ajax({
    //             url: "<?= base_url('user/getUserJ') ?>",
    //             data: {
    //                 jurusan: jurusan
    //             },
    //             method: "post",
    //             dataType: "json",
    //             success: function(data) {
    //                 $('.nama').html(data);
    //                 // console.log(data);
    //             }

    //         });

    //     });
    // });
</script>

</body>

</html>