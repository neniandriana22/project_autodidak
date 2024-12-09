<?php
include "koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Export Excel Data Pengunjung.xls");
header("Pragma: no-cache");
header("Expire:0");
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6">Rekapitulasi Data Pengunjung</th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama Pengunjung</th>
            <th>Alamat</th>
            <th>Tujuan</th>
            <th>No. HP</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Mengambil nilai tanggal dari form
        $tgl1 = $_POST['tanggala'];
        $tgl2 = $_POST['tanggalb'];

        // Query dengan filter tanggal
        $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY tanggal asc");
        $no = 1;

        // Menampilkan data
        while ($data = mysqli_fetch_array($tampil)) {
            // Format ulang tanggal untuk tampilan (d-m-Y)
            $formattedDate = date('d-m-Y', strtotime($data['tanggal']));
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $formattedDate ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['tujuan'] ?></td>
                <td><?= $data['nope'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>