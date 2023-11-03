<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>

            <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#konsumenBaruModal"> + Tambah Customer</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Customer</th>
                        <th scope="col">Nama Customer</th>
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
                                <a href="<?= base_url('konsumen/ubahKonsumen/') . $row['kode_konsumen']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('konsumen/hapuskonsumen/') . $row['kode_konsumen']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $row['kode_konsumen']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah konsumen baru-->
<div class="modal fade" id="konsumenBaruModal" tabindex="-1" role="dialog" aria-labelledby="konsumenBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konsumenBaruModalLabel">Tambah Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('konsumen'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kode_konsumen" name="kode_konsumen" value="<?= $kode_konsumen; ?>" placeholder="Masukkan Kode Customer" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_konsumen" name="nama_konsumen" placeholder="Masukkan Nama Customer" required>
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