<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6" id="table-datatable">
            <?php
            foreach ($konsumen as $ksn) { ?>
                <form action="<?= base_url('konsumen/updateKonsumen'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="kode_konsumen" name="kode_konsumen" value="<?= $ksn['kode_konsumen']; ?>" placeholder="Masukkan Kode Customer" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama_konsumen" name="nama_konsumen" value="<?= $ksn['nama_konsumen']; ?>" placeholder="Masukkan Nama Customer" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="alamat_konsumen" name="alamat_konsumen" value="<?= $ksn['alamat_konsumen']; ?>" placeholder="Masukkan Alamat" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" value="<?= $ksn['no_telp']; ?>" placeholder="Masukkan Nomor Telp" required>
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