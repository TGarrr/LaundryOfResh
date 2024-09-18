<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Konsumen
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_konsumen; ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transaksi Baru
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $transaksi_baru; ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa fa-dollar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Transaksi
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_transaksi; ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa fa-line-chart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<hr class="sidebar-divider">
<!-- row table-->
<div class="row">
    <div class="table-responsive table-bordered col-sm-10 ml-auto mr-auto mt-2">
        <div class="page-header">
            <span class="fas fa-dollar text-primary mt-2 "> Data Transaksi</span>
            <a href="<?= base_url('transaksi'); ?>"><i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i></a>
        </div>
        <table class="table mt-3">
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
                        <td><?= $row['status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>