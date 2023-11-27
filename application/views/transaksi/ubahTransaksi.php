<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    foreach ($transaksi as $trs) { ?>
        <form method="post" action="<?= base_url('transaksi/updateTransaksi'); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" id="kode_transaksi" name="kode_transaksi" value="<?= $trs['kode_transaksi']; ?>" class="form-control form-control-user" placeholder="Masukkan Kode Transaksi" readonly>
                </div>
                <div class="form-group">
                    <select class="form-control form-control-user" name="kode_konsumen" required>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" value="Kembali" onclick="window.history.go(-1)"><i class="fas fa-ban"></i> Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle" value="Update"></i> Update</button>
                </div>
            </div>

        </form>
    <?php } ?>
</div>
</div>
</div>