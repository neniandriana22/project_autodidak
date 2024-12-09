<?php include "header.php"; ?>

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="m-0"><i class="fa fa-table"></i> Rekapitulasi Pengunjung <?= date('d-m-Y') ?></h5>
        </div>
        <div class="card-body">
            <form method="POST" action="" class="text-center mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Dari Tanggal</label>
                            <input type="date" name="tanggal1" class="form-control" value="<?= isset($_POST['tanggal1']) ? $_POST['tanggal1'] : date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Sampai Tanggal</label>
                            <input type="date" name="tanggal2" class="form-control" value="<?= isset($_POST['tanggal2']) ? $_POST['tanggal2'] : date('Y-m-d') ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <button type="submit" name="btampilkan" class="btn btn-primary btn-block">
                            <i class="fa fa-search"></i> Tampilkan
                        </button>
                    </div>
                    <div class="col-md-2">
                        <a href="admin.php" class="btn btn-danger btn-block">
                            <i class="fa fa-backward"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>

            <?php if (isset($_POST['btampilkan'])): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="bg-light text-primary">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Pengunjung</th>
                                <th>Alamat</th>
                                <th>Tujuan</th>
                                <th>No. HP</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-light text-primary">
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
                            $tgl1 = $_POST['tanggal1'];
                            $tgl2 = $_POST['tanggal2'];
                            $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id DESC");
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) {
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
                </div>
                <div class="text-center mt-4">
                    <form method="POST" action="exportexcel.php">
                        <input type="hidden" name="tanggala" value="<?= @$_POST['tanggal1'] ?>">
                        <input type="hidden" name="tanggalb" value="<?= @$_POST['tanggal2'] ?>">
                        <button class="btn btn-success">
                            <i class="fa fa-download"></i> Export Data Excel
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<!-- Tambahkan CSS -->
<style>
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
        transition: all 0.2s ease-in-out;
    }

    .card-header {
        border-bottom: 2px solid #f1f1f1;
    }
</style>