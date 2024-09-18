<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <style>
        th {
            font-size: 14px;
            font-family: sans-serif;
            /* background: blue; */
        }
    </style>
</head>

<body>
    <table width="525" border="0">
        <tr>
            <td style=" text-align:center; font-size: 24px; font-weight:bold; font-family:sans-serif;"> Laporan transaksi</td>
        </tr>
    </table>

    <table width=" 525" border="0">
        <tr>
            <td style=" text-align:center; font-size: 16px; font-family:sans-serif;"> Dari Tanggal <?= mediumdate_indo($this->session->userdata('tanggal_mulai')); ?> Sampai Tanggal <?= mediumdate_indo($this->session->userdata('tanggal_ahir')); ?></td>
        </tr>
    </table>
    <br>

    <table width=" 525" border="1">
        <tr>
            <th>Tanggal Masuk</th>
            <th>Kode Transaksi</th>
            <th>konsumen</th>
            <th>Paket</th>
            <th>Berat (KG)</th>
            <th>Grand Total</th>
            <th>Status</th>
        </tr>

        <?php foreach ($laporan as $lpr) { ?>
            <tr>
                <!-- <td><?= mediumdate_indo($lpr->tgl_masuk); ?></td> -->
                <td><?= $lpr->tgl_masuk; ?></td>
                <td><?= $lpr->kode_transaksi; ?></td>
                <td><?= $lpr->nama_konsumen; ?></td>
                <td><?= $lpr->nama_paket; ?></td>
                <td><?= $lpr->berat; ?></td>
                <td><?= 'Rp' . number_format($lpr->grand_total); ?></td>
                <td><?= $lpr->status; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>