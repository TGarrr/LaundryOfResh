<!-- Footer -->
<!-- <footer class="sticky-footer bg-white" id="footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Laundryofresh <?= date('Y'); ?></span>
        </div>
    </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout');  ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

<!-- jquerrry -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $(document).ready(function() {
        $("#table-datatable").dataTable();
    });
    $('.alert-message').alert().delay(3500).slideUp('slow');
</script>

<script>
    $('#paket').change(function() {
        var kode_paket = $(this).val();

        $.ajax({
            url: '<?= base_url('transaksi/getHargaPaket') ?>',
            data: {
                kode_paket: kode_paket
            },
            method: 'post',
            dataType: 'JSON',
            success: function(hasil) {
                $('#harga').val(hasil.harga_paket);
            }
        });
    });

    // membuat grand total otomatis 
    $('#berat').keyup(function() {
        var berat = $(this).val();
        var harga = document.getElementById('harga').value;
        $('#grand_total').val(berat * harga);

    });

    // Status
    // $('.status').change(function() {
    //     var status = $(this).val();
    //     // melakukan pemecahan STRING
    //     // ada dua parameter di mulai dari 0 kemudian Lengh/Panjangnya sesuai kt
    //     var kt = status.substr(0, 13);
    //     // stt(status) di mulai dari 13 lnjt lengh yg mau kita ambil yaitu 10
    //     var stt = status.substr(13, 10);

    //     // proses AJAX
    //     $.ajax({
    //         url: "<?= base_url('transaksi/updateStatus') ?>",
    //         method: "post",
    //         data: {
    //             kt: kt,
    //             stt: stt
    //         }
    //     });
    //     location.reload();
    // });

    // $('.status').change(function() {
    //     var status = $(this).val();
    //     var kt = status.substr(0, 13);
    //     var stt = status.substr(13, 10);

    //     $.ajax({
    //         url: `<?php echo base_url('transaksi/updateStatus'); ?>`,
    //         method: "post",
    //         data: {
    //             kt: kt,
    //             stt: stt
    //         },
    //         success: function(response) {
    //             // Tindakan setelah permintaan AJAX berhasil
    //             // Misalnya, perbarui tampilan atau lakukan sesuatu dengan respons
    //             console.log(response); // Menampilkan respons di konsol untuk pemecahan masalah/debugging
    //             // Jika diperlukan, tambahkan logika untuk memperbarui tampilan tanpa perlu reload
    //         },
    //         error: function(xhr, status, error) {
    //             // Penanganan kesalahan jika permintaan AJAX gagal
    //             console.error(error); // Menampilkan kesalahan di konsol untuk pemecahan masalah/debugging
    //         }
    //     });
    // });
</script>
</body>

</html>