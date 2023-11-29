<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6" id="table-datatable">
            <!-- <?php
                    foreach ($laporan as $lpr) { ?>
                <form action="<?= base_url('laporan/cetakLaporan'); ?>" method="post" class="form-user" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_paket" id="id_paket" value="<?php echo $pkt['id_paket']; ?>">
                            <input type="text" class="form-control form-control-user" id="kode_paket" name="kode_paket" value="<?= $pkt['kode_paket']; ?>" placeholder="Masukkan Kode Customer" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" value="Kembali" onclick="window.history.go(-1)"><i class="fas fa-ban"></i> Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle" value="Update"></i> Update</button>
                    </div>
                </form>
            <?php } ?> -->
            <form action="<?= base_url('laporan/cetakLaporan'); ?>" method="post" class="form-user" enctype="multipart/form-data">
                <div class="modal-body row">
                    <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
                    <div class="form-group">
                        <input type="date" name="tgl_mulai" class="form-control form-control-user" required>
                    </div>
                </div>
                <div class="modal-body row">
                    <label class="col-sm-4 col-form-label">Tanggal Akhir</label>
                    <div class="form-group">
                        <input type="date" name="tgl_ahir" class="form-control form-control-user" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle" value="Update"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>