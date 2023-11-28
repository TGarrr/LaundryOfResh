<!-- Begin Page Content -->
<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_masuk = date('Y-m-d h:i:s');
?>
<div class="container-fluid" id="table-datatable">

    <?= $this->session->flashdata('pesanTrs'); ?>
    <div class="row">
        <div class="col-lg-12" id="table-datatable">
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
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Berat (KG)</th>
                        <th scope="col">Grand Total</th>
                        <th scope="col">Tanggal Ambil </th>
                        <th scope="col">Status Bayar </th>
                        <th scope="col">Status</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $row) { ?>
                        <tr>
                            <th scape="row"><?= $no++; ?></th>
                            <td><?= $row['kode_transaksi']; ?></td>
                            <td><?= $row['tgl_masuk']; ?></td>
                            <td><?= $row['nama_konsumen']; ?></td>
                            <td><?= $row['nama_paket']; ?></td>
                            <td><?= $row['berat']; ?></td>
                            <td><?= 'Rp' . number_format($row['grand_total']); ?></td>
                            <td><?= $row['tgl_ambil']; ?></td>
                            <td><?= $row['bayar']; ?></td>
                            <td>
                                <?php
                                if ($row['status'] == "Baru") { ?>
                                    <select name="status" class="badge badge-danger status">
                                        <option value="<?= $row['status']; ?>Baru" selected>Baru</option>
                                        <option value="<?= $row['status']; ?>Proses">Proses</option>
                                        <option value="<?= $row['status']; ?>Selesai">Selesai</option>
                                    </select>
                                <?php } else if ($row['status'] == "Proses") { ?>
                                    <select name="status" class="badge badge-warning status">
                                        <option value="<?= $row['status']; ?>Baru">Baru</option>
                                        <option value="<?= $row['status']; ?>Proses" selected>Proses</option>
                                        <option value="<?= $row['status']; ?>Selesai">Selesai</option>
                                    </select>
                                <?php } else { ?>
                                    <button class="btn btn-success btn-sm dropdown-toggle">Selesai</button>
                                <?php }
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url('transaksi/detailTransaksi/') . $row['kode_transaksi']; ?>" class="badge badge-warning"><i class="fa fa-external-link-square"></i> Detail</a>
                                <a href="<?= base_url('transaksi/updateTransaksi/') . $row['kode_transaksi']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
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

<!-- End of Modal Tambah Mneu -->