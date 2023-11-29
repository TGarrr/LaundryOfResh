<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesanPkt'); ?>
    <div class="row">
        <div class="col-lg-12" id="table-datatable">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#PaketBaruModal"> + Tambah Paket</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="color: red;">#</th>
                        <th scope="col">Kode Paket</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga Paket</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $row) { ?>
                        <tr>
                            <th scape="row"><?= $no++; ?></th>
                            <td><?= $row['kode_paket']; ?></td>
                            <td><?= $row['nama_paket']; ?></td>
                            <td><?= $row['harga_paket']; ?></td>
                            <td>
                                <a href="<?= base_url('paket/updatePaket/') . $row['kode_paket']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('paket/hapusPaket/') . $row['kode_paket']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $row['kode_paket']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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

<!-- Modal Tambah paket baru-->
<div class="modal fade" id="PaketBaruModal" tabindex="-1" role="dialog" aria-labelledby="PaketBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PaketBaruModalLabel">Tambah Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('paket'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kode_paket" name="kode_paket" value="<?= $kode_paket; ?>" placeholder="Masukkan Kode Customer" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_paket" name="nama_paket" placeholder="Input Nama Paket" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga_paket" name="harga_paket" placeholder="Input Harga Paket" required>
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