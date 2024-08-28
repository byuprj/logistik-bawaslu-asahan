<?php
    error_reporting(0);
    include('..\..\koneksi\koneksi.php');

    // Fungsi untuk menghitung total barang dari tb_transaksi
    function hitungTotalBarang($koneksi) {
        $query_total = mysqli_query($koneksi, "
            SELECT 
                nama_barang,
                SUM(jumlah) AS total_jumlah
            FROM tb_transaksi
            GROUP BY nama_barang
        ");

        $totals = [];
        while ($row = mysqli_fetch_assoc($query_total)) {
            $totals[$row['nama_barang']] = $row['total_jumlah'];
        }

        return $totals;
    }

    // Mengambil total barang dari tb_transaksi
    $totalBarang = hitungTotalBarang($koneksi);

    // Mengambil data barang dari tb_barang
    function ambilDataBarang($koneksi) {
        $query = mysqli_query($koneksi, "SELECT nama_barang, banyak_brg FROM tb_barang");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[$row['nama_barang']] = $row['banyak_brg'];
        }
        return $data;
    }

    // Data keseluruhan barang berdasarkan tb_barang
    $totalKeseluruhan = ambilDataBarang($koneksi);

    // Fungsi untuk menentukan warna progress bar
    function getProgressBarColor($percentage) {
        if ($percentage <= 25) {
            return 'bg-danger';
        } elseif ($percentage <= 50) {
            return 'bg-warning';
        } elseif ($percentage <= 75) {
            return 'bg-primary';
        } else {
            return 'bg-success';
        }
    }
?>

<div class="content">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">GRAFIK PEMASUKAN BARANG</h4>
    </div>
    <div class="card-body" style="overflow-y: auto; max-height: 400px;">
        <?php foreach ($totalBarang as $nama_barang => $jumlah): ?>
            <?php
                $totalKeseluruhanBarang = isset($totalKeseluruhan[$nama_barang]) ? $totalKeseluruhan[$nama_barang] : 100;
                $percentage = ($jumlah / $totalKeseluruhanBarang) * 100;
            ?>
            <h4 class="small font-weight-bold mt-4"><?php echo ucfirst($nama_barang); ?> <span class="float-right"><?php echo round($percentage, 2); ?>%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar <?php echo getProgressBarColor($percentage); ?>" role="progressbar" style="width: <?php echo $percentage; ?>%"
                    aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        <?php endforeach; ?>
    </div><br><br>

    <div class="table-responsive" style="overflow-y: auto; max-height: 400px;">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary mt-3">Data Barang Keseluruhan</h4>
        </div>
        <table class="table table-bordered table-hover table-striped" width="100%">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Total Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($totalKeseluruhan as $nama_barang => $jumlah): ?>
                    <tr>
                        <td><?php echo ucfirst($nama_barang); ?></td>
                        <td><?php echo $jumlah; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><br><br>

    <div class="table-responsive" style="overflow-y: auto; max-height: 400px;">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary mt-3">Data Barang yang sudah di antar</h4>
        </div>
        <table class="table table-bordered table-hover table-striped" width="100%">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Total Barang yang Sudah Diantar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($totalBarang as $nama_barang => $jumlah): ?>
                    <tr>
                        <td><?php echo ucfirst($nama_barang); ?></td>
                        <td><?php echo $jumlah; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
