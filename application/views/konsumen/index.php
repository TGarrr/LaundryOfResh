<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesanKsn'); ?>
    <div class="row">
        <div class="col-lg-12" id="table-datatable">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#konsumenBaruModal"> + Tambah Konsumen</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="color: red;">#</th>
                        <th scope="col">Kode Konsumen</th>
                        <th scope="col">Nama Konsumen</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor Telp</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $row) { ?>
                        <tr>
                            <th scape="row"><?= $no++; ?></th>
                            <td><?= $row['kode_konsumen']; ?></td>
                            <td><?= $row['nama_konsumen']; ?></td>
                            <td><?= $row['alamat_konsumen']; ?></td>
                            <td><?= $row['no_telp']; ?></td>
                            <td>
                                <!-- <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#ubahKonsumen <?= $row['id_konsumen']; ?>"><i class=" fas fa-edit"></i> Edit</button> -->
                                <a href="<?= base_url('konsumen/updateKonsumen/') . $row['id_konsumen']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('konsumen/hapusKonsumen/') . $row['id_konsumen']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $row['kode_konsumen']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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

<!-- Modal Tambah konsumen baru-->
<div class="modal fade" id="konsumenBaruModal" tabindex="-1" role="dialog" aria-labelledby="konsumenBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konsumenBaruModalLabel">Tambah Konsumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('konsumen'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kode_konsumen" name="kode_konsumen" value="<?= $kode_konsumen; ?>" placeholder="Masukkan Kode Konsumen " readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_konsumen" name="nama_konsumen" placeholder="Masukkan Nama Konsumen " required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat_konsumen" name="alamat_konsumen" placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telp" required>
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
<!-- End of Modal Tambah Mneu -->


<!-- Modal Ubah konsumen baru -->
<!-- <?php
        foreach ($data as $row) { ?>
    <div class="modal fade" id="ubahKonsumen <?= $row['id_konsumen']; ?>" tabindex="-1" role="dialog" aria-labelledby="konsumenBaruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konsumenBaruModalLabel">Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('konsumen'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="kode_konsumen" value="<?= $row['$kode_konsumen']; ?>" placeholder="Masukkan Kode Customer" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama_konsumen" value="<?= $row['nama_konsumen']; ?>" placeholder="Masukkan Nama Customer" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="alamat_konsumen" name="alamat_konsumen" value="<?= $row['alamat_konsumen']; ?>" placeholder="Masukkan Alamat" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="no_telp" value="<?= $row['no_telp']; ?>" placeholder="Masukkan Nomor Telp" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?> -->

<!-- End of Modal Ubah Mneu -->