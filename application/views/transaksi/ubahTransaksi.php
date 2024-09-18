<!-- Begin Page Content -->
<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_ambil = date('Y-m-d h:i:s');
// echo $tgl_ambil;
?>
<div class="container-fluid">
    <?php
    foreach ($transaksi as $trs) { ?>
        <form method="post" action="<?= base_url('transaksi/updateTransaksi'); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" id="kode_transaksi" name="kode_transaksi" value="<?= $trs['kode_transaksi']; ?>" class="form-control form-control-user" placeholder="Masukkan Kode Transaksi" readonly>
                </div>
                <div class="form-group">
                    <!-- <input type="text" id="kode_konsumen" name="kode_konsumen" value="<?= $trs['kode_konsumen'] == $kons->nama_konsumen; ?>" class="form-control form-control-user" placeholder="Masukkan Kode Transaksi" readonly> -->
                    <select class="form-control form-control-user" name="kode_konsumen" required readonly>
                        <?php
                        foreach ($konsumen as $kons) {
                            if ($trs['kode_konsumen'] == $kons->kode_konsumen) { ?>
                                <option value="<?= $kons->kode_konsumen ?>" selected> <?= $kons->nama_konsumen ?></option>
                            <?php } else { ?>
                                <option value="<?= $kons->kode_konsumen ?>"> <?= $kons->nama_konsumen ?></option>
                        <?php }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control form-control-user" id="paket" name="kode_paket" required>
                        <?php
                        foreach ($paket as $pkt) {
                            if ($trs['kode_paket'] == $pkt->kode_paket) { ?>
                                <option value="<?= $pkt->kode_paket ?>" selected> <?= $pkt->nama_paket ?></option>
                            <?php } else { ?>
                                <option value="<?= $pkt->kode_paket ?>"> <?= $pkt->nama_paket ?></option>
                        <?php }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="harga" placeholder="Harga Paket" readonly>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" name="berat" id="berat" value="<?= $trs['berat']; ?>" placeholder="Berat (KG)">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" name="grand_total" id="grand_total" value="<?= $trs['grand_total']; ?>" placeholder="Grand Total" readonly>
                </div>
                <div class="form-group" hidden>
                    <input type="text" class="form-control form-control-user" name="tgl_masuk" value="<?= $trs['tgl_masuk']; ?>" placeholder="Tanggal Masuk" readonly>
                </div>
                <!-- <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="tgl_ambil" value="<?= $tgl_ambil; ?>" placeholder="Tanggal Masuk" readonly>
                </div> -->
                <div class="form-group">
                    <select class="form-control form-control-user" name="bayar">
                        <?php
                        if ($transaksi['bayar'] == "Lunas") { ?>
                            <option value="Lunas" selected> Lunas </option>
                            <option value="Belum Lunas"> Belum Lunas </option>
                        <?php } else { ?>
                            <option value="Lunas"> Lunas </option>
                            <option value="Belum Lunas" selected> Belum Lunas </option>
                        <?php }

                        ?>
                    </select>
                </div>
                <div class="form-group" hidden>
                    <input type="text" class="form-control form-control-user" name="status" placeholder="Status" value="Baru" readonly>
                    <!-- <select class="form-control form-control-user" name="status">
                        <?php
                        if ($trs['status'] == "Baru") { ?>
                            <option value="Baru" selected> Baru </option>
                            <option value="Sedang Proses"> Sedang Proses </option>
                            <option value="Selesai"> Selesai </option>
                        <?php } else { ?>
                            <option value="Baru" selected> Baru </option>
                            <option value="Sedang Proses"> Sedang Proses </option>
                            <option value="Selesai"> Selesai </option>
                        <?php }
                        ?>
                    </select> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" value="Kembali" onclick="window.history.go(-1)"><i class="fas fa-ban"></i> Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle" value="Update"></i> Update</button>
                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#TransakasiEditStatus"> Edit Status</a>
                </div>
            </div>
        </form>
    <?php } ?>
</div>

<!-- <div class="modal fade" id="TransakasiEditStatus" tabindex="-1" role="dialog" aria-labelledby="TransakasiEditStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TransaksiEditStatusLabel">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            foreach ($transaksi as $trs) { ?>
                <form method="post" action="<?= base_url('transaksi/updateStatusTransaksi'); ?>">
                    <div class="modal-body">
                        <div class="form-group" hidden>
                            <input type="text" class="form-control form-control-user" name="tgl_ambil" placeholder="Tanggalambil" value="<?= $trs['tgl_ambil']; ?>">
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-user" name="status">
                                <?php
                                if ($trs['status'] == "Baru") { ?>
                                    <option value="Baru" selected> Baru </option>
                                    <option value="Sedang Proses"> Sedang Proses </option>
                                    <option value="Selesai"> Selesai </option>
                                <?php } else { ?>
                                    <option value="Baru" selected> Baru </option>
                                    <option value="Sedang Proses"> Sedang Proses </option>
                                    <option value="Selesai"> Selesai </option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Edit Status</button>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div> -->

<div class="modal fade" id="TransakasiEditStatus" tabindex="-1" role="dialog" aria-labelledby="TransakasiEditStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TransaksiEditStatusLabel">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            foreach ($transaksi as $trs) { ?>
                <form method="post" action="<?= base_url('transaksi/updateStatusTransaksi'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="kode_transaksi" name="kode_transaksi" value="<?= $trs['kode_transaksi']; ?>" class="form-control form-control-user" placeholder="Masukkan Kode Transaksi" readonly>
                        </div>
                        <div class="form-group" hidden>
                            <input type="text" class="form-control form-control-user" name="tgl_ambil" value="<?= $tgl_ambil; ?>" placeholder="Tanggal Ambil" readonly>
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-user" name="status">
                                <?php
                                if ($trs['status'] == "Baru") { ?>
                                    <option value="Baru" selected> Baru </option>
                                    <option value="Sedang Proses"> Sedang Proses </option>
                                    <option value="Selesai"> Selesai </option>
                                <?php } else { ?>
                                    <option value="Baru" selected> Baru </option>
                                    <option value="Sedang Proses"> Sedang Proses </option>
                                    <option value="Selesai"> Selesai </option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Edit Status</button>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>