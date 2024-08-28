<?php
    error_reporting(0);
    include('..\..\koneksi\koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Pengirim</title>
    <style>
        @media print {
            img {
                display: block;
                margin-bottom: 20px;
            }
            h2 {
                text-align: center;
                margin-bottom: 50px;
            }
            table {
                width: 90%;
                border-collapse: collapse;
                margin: auto;
            }
            table, th, td {
                border: 1px solid black;
                padding: 5px;
            }
            th, td {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <h2>Data Pengirim</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Jenis Kelamin</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Bergabung Pada</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $q = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan ORDER BY nama_pelanggan ASC");
                while ($data = mysqli_fetch_assoc($q)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_pelanggan']; ?></td>
                <td><?php echo $data['jenis_kelamin']; ?></td>
                <td><?php echo $data['no_telp']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['bergabung_pada']; ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>
