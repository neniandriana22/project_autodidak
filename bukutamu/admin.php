<?php include "header.php";?>

<?php
if(isset($_POST['bsimpan'])){
    $tgl = date('Y-m-d');

    $nama = htmlspecialchars ($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars ($_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars ($_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars ($_POST['nope'], ENT_QUOTES);

    $simpan = mysqli_query($koneksi, "INSERT INTO ttamu (tanggal, nama, alamat, tujuan, nope) VALUES ('$tgl', '$nama', '$alamat', '$tujuan', '$nope')");

    if($simpan){
        echo "<script>alert('Data Berhasil Disimpan, Terima Kasih..!');
        document.location='?'</script>";
    }else {
        echo "<script>alert('Simpan Data GAGAL !!!');
        document.location='?'</script>";
    }
}
?>

<div class="head text-center">
    <img src="assets/img/logo.png" width="150">
    <h2 class="text-white"><b><i class="fa fa-book text-warning"></i> SELAMAT DATANG DI BUKU KUNJUNGAN PERPUSTAKAAN</b></h2>
</div>

<div class="row mt-2">
    <div class="col-lg-7 mb-3">
        <div class="card shadow bg-gradient-light">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><i class="fa fa-user text-primary"></i> Identitas Pengunjung</h1>
                </div>
                <form class="user" method="POST" action="">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="tujuan" placeholder="Tujuan Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nope" placeholder="No. HP Pengunjung" required>
                    </div>
                    <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">
                        <i class="fa fa-save text-white"></i> Simpan Data
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="#"><i class="fa fa-copyright text-success"></i> By Neni Andriana | 2024 - <?=date('Y')?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><i class="fa fa-chart-bar text-info"></i> Statistik Pengunjung</h1>
                </div>
                <?php
                    $tgl_sekarang = date ('Y-m-d');
                    $kemarin = date ('Y-m-d', strtotime('-1 day', strtotime (date ('Y-m-d'))));
                    $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime ($tgl_sekarang) ) );
                    $sekarang = date('Y-m-d h:i:s');
                    $tgl_sekarang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM ttamu where tanggal like '%$tgl_sekarang%'"));
                    $kemarin = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM ttamu where tanggal like '%$kemarin%'"));
                    $seminggu = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM ttamu where tanggal BETWEEN '$seminggu' and '$sekarang'"));
                    $bulan_ini = date('m');
                    $sebulan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM ttamu where month(tanggal) = '$bulan_ini'"));
                    $keseluruhan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM ttamu"));
                ?>
                <table class="table table-bordered">
                    <tr>
                        <td><i class="fa fa-calendar-day text-warning"></i> Hari ini</td>
                        <td><?= $tgl_sekarang[0]?></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-calendar-minus text-danger"></i> Kemarin</td>
                        <td><?= $kemarin[0]?></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-calendar-week text-success"></i> Minggu ini</td>
                        <td><?=$seminggu[0]?></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-calendar-alt text-primary"></i> Bulan ini</td>
                        <td><?=$sebulan[0]?></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-chart-line text-info"></i> Keseluruhan</td>
                        <td><?=$keseluruhan[0]?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold"><i class="fa fa-database text-warning"></i> Data Pengunjung Hari Ini <?= date('d-m-Y') ?></h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <a href="rekapitulasi.php" class="btn btn-success"><i class="fa fa-table"></i> Rekapitulasi Pengunjung</a>
            <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out-alt"></i> Logout</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama Pengunjung</th>
                        <th>Alamat</th>
                        <th>Tujuan</th>
                        <th>No. HP</th>
                    </tr>
                </thead>
                <tfoot class="bg-light">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama Pengunjung</th>
                        <th>Alamat</th>
                        <th>Tujuan</th>
                        <th>No. HP</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $tgl = date('Y-m-d');
                    $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE tanggal LIKE '%$tgl%' ORDER BY id DESC");
                    $no = 1;

                    while ($data = mysqli_fetch_array($tampil)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['tanggal'] ?></td>
                        <td><?= htmlspecialchars($data['nama'], ENT_QUOTES) ?></td>
                        <td><?= htmlspecialchars($data['alamat'], ENT_QUOTES) ?></td>
                        <td><?= htmlspecialchars($data['tujuan'], ENT_QUOTES) ?></td>
                        <td><?= htmlspecialchars($data['nope'], ENT_QUOTES) ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "footer.php";?>