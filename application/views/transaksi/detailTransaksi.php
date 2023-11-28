<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
        td {
            font-size: 12px;
            font-family: Georgia;
        }

        h3 {
            font-size: 16px;
        }

        th {
            font-family: sans-serif;
            font-size: 12px;
        }

        .table {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td width="400">
                <h3>LaundryOfresh</h3>
            </td>
            <td>
                <h3>Invoice</h3>
            </td>
        </tr>
        <tr>
            <td>Alamat : KRAMXXX</td>
        </tr>
        <tr>
            <td>No Telp : 08XXXXXXXXX</td>
        </tr>
        <tr>
            <td>Email : LaundryOfresh@gmail.com</td>
        </tr>
    </table>
    <hr>
    <br>

    <table>
        <?php foreach ($detailTransaksi as $detail) { ?>
            <tr>
                <td width="60" style="font-weight: bold;">Konsumen</td>
                <td width="300"><?= $detail['nama_konsumen']; ?></td>

                <td width="60" style="font-weight: bold;">kode Transaksi</td>
                <td><?= $detail['kode_transaksi']; ?></td>
            </tr>
            <tr>
                <td width="60"></td>
                <td width="300"><?= $detail['alamat_konsumen']; ?></td>

                <td width="60" style="font-weight: bold;">Tanggal Masuk</td>
                <td><?= $detail['tgl_masuk']; ?></td>
            </tr>
            <tr>
                <td width="60"></td>
                <td width="300"><?= $detail['no_telp']; ?></td>
                <?php
                foreach ($transaksi as $trs) {
                    if ($trs['tgl_ambil']  !== 1) { ?>
                        <td width="60" style="font-weight: bold;">Tanggal Ambil</td>
                        <td><?= $trs['tgl_ambil']; ?></td>
                    <?php } else { ?>
                        <td width="60" style="font-weight: bold;">Tanggal Ambil</td>
                        <td style="color:red;">Belum Di ambil</td>
                <?php }
                }
                ?>

            </tr>
        <?php } ?>
    </table>
    <br>

    <table width="500" class="table">
        <tr>
            <th class="table">Paket Laundry</th>
            <th class="table">Berat / KG</th>
            <th class="table">Harga</th>
            <th class="table">Sub Total</th>
        </tr>

        <?php foreach ($detailTransaksi as $detail) { ?>
            <tr>
                <td class="table"><?= $detail['nama_paket']; ?></td>
                <td class="table"><?= $detail['berat']; ?></td>
                <td class="table"><?= "Rp " . number_format($detail['harga_paket'], 0, '.', '.'); ?></td>
                <td class="table"><?= "Rp " . number_format($detail['grand_total'], 0, '.', '.'); ?></td>
            </tr>
            <tr>
                <td class="table" colspan="3" style="text-align: right; font-weight: bold;">Grand Total</td>
                <td class="table" style="font-weight: bold;"><?= "Rp" . number_format($detail['grand_total'], 0, '.', '.'); ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <table>
        <tr>
            <td width="400">
                <h3>Keterangan</h3>
            </td>
        </tr>
        <tr>
            <td>1. Pengambilan Cucian Harus membawa Nota/Invoice.</td>
        </tr>
        <tr>
            <td>2. Cuci Luntur Bukan Tanggung Jawab Kami.</td>
        </tr>
        <tr>
            <td>3. Hitung dan periksa Sebelum pergi. </td>
        </tr>
        <tr>
            <td>4. Claim Kehilangan Cucian Setelah Meninggalkan Laundry Tidak dilayani. </td>
        </tr>
    </table>

</body>

</html>