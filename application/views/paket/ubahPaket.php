<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6" id="table-datatable">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <?php
            foreach ($paket as $pkt) { ?>
                <form action="<?= base_url('paket/updatePaket'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_paket" id="id_paket" value="<?php echo $pkt['id_paket']; ?>">
                            <input type="text" class="form-control form-control-user" id="kode_paket" name="kode_paket" value="<?= $pkt['kode_paket']; ?>" placeholder="Masukkan Kode Customer" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama_paket" name="nama_paket" value="<?= $pkt['nama_paket']; ?>" placeholder="Masukkan Nama Customer" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="harga_paket" name="harga_paket" value="<?= $pkt['harga_paket']; ?>" placeholder="Masukkan harga" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" value="Kembali" onclick="window.history.go(-1)"><i class="fas fa-ban"></i> Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle" value="Update"></i> Update</button>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>