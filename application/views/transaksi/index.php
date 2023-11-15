<!-- Begin Page Content -->
<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_masuk = date('Y-m-d h:i:s');
?>
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#TransakasiBaruModal"> + Tambah Transakasi</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="color: red;">#</th>
                        <th scope="col">Kode Transakasi</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Ambil </th>
                        <th scope="col">Berat</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                            $no = 1;
                            foreach ($data as $row) { ?>
                        <tr>
                            <th scape="row"><?= $no++; ?></th>
                            <td><?= $row['kode_Transaksi']; ?></td>
                            <td><?= $row['tgl_masuk']; ?></td>
                            <td><?= $row['tgl_ambil']; ?></td>
                            <td><?= $row['berat']; ?></td>
                            <td><?= $row['grand_total']; ?></td>
                            <td><?= $row['bayar']; ?></td>
                            <td><?= $row['status']; ?></td>
                            <td>
                                <!-- <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#ubahpaket <?= $row['id_paket']; ?>"><i class=" fas fa-edit"></i> Edit</button> -->
                    <a href="<?= base_url('transaksi/updatePaket/') . $row['id_paket']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Edit</a>
                    <a href="<?= base_url('transaksi/hapusPaket/') . $row['id_paket']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $row['kode_paket']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                    </tr>
                <?php } ?> -->
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- </div> -->
<!-- End of Main Content -->

<!-- Modal Tambah Transakasi baru-->
<div class="modal fade" id="TransakasiBaruModal" tabindex="-1" role="dialog" aria-labelledby="TransakasiBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TransaksiBaruModalLabel">Tambah Transakasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('transaksi'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kode_transaksi" name="kode_transaksi" placeholder="Masukkan Kode Transaksi" value="<?= "TR" . date('Ymd') . $kode_transaksi ?>" readonly>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user" name="kode_konsumen" required>
                            <option value="" selected>
                                - Pilih Konsumen-
                            </option>
                            <?php
                            foreach ($konsumen as $row) { ?>
                                <option value="<?= $row->kode_konsumen ?>"> <?= $row->nama_konsumen; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user" id="paket" name="kode_paket" required>
                            <option value="" selected>
                                - Pilih Paket-
                            </option>
                            <?php
                            foreach ($paket as $row) { ?>
                                <option value="<?= $row->kode_paket ?>"> <?= $row->nama_paket; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga" placeholder="Harga Paket" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" name="berat" id="berat" placeholder="Berat (KG)">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" name="grand_total" id="grand_total" placeholder="Grand Total" readonly>
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" class="form-control form-control-user" name="tgl_masuk" placeholder="Tanggal Masuk" value="<?= $tgl_masuk; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user" name="bayar">
                            <option value="">- Pilih Status Bayar -</option>
                            <option value="Lunas"> Lunas </option>
                            <option value="Belum Lunas"> Belum Lunas </option>
                        </select>
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" class="form-control form-control-user" name="status" placeholder="Status" value="Baru" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mengambil Harga dari Table Paket Menggunakan JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
</script>
<!-- End of Modal Tambah Mneu -->