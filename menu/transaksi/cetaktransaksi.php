<?php
	error_reporting(0);
	include('..\..\koneksi\koneksi.php');

    $no = 0;
    $nama_pelanggan = "";
    $alamat = "";
    $no_telp = "";
    $nama_barang = "";
    $alamat_brg = "";
    $jumlah = "";
    $tanggal_ambil = "";
    $q = mysqli_query($koneksi, "SELECT *,
    date_format(t.tanggal_ambil, '%d') AS tgl,
    date_format(t.tanggal_ambil, '%m') AS bulan,
    date_format(t.tanggal_ambil, '%Y') AS thn,
    CASE
        WHEN date_format(t.tanggal_ambil, '%m')=01 THEN 'Januari'
        WHEN date_format(t.tanggal_ambil, '%m')=02 THEN 'Februari'
        WHEN date_format(t.tanggal_ambil, '%m')=03 THEN 'Maret'
        WHEN date_format(t.tanggal_ambil, '%m')=04 THEN 'April'
        WHEN date_format(t.tanggal_ambil, '%m')=05 THEN 'Mei'
        WHEN date_format(t.tanggal_ambil, '%m')=06 THEN 'Juni'
        WHEN date_format(t.tanggal_ambil, '%m')=07 THEN 'Juli'
        WHEN date_format(t.tanggal_ambil, '%m')=08 THEN 'Agustus'
        WHEN date_format(t.tanggal_ambil, '%m')=09 THEN 'September'
        WHEN date_format(t.tanggal_ambil, '%m')=10 THEN 'Oktober'
        WHEN date_format(t.tanggal_ambil, '%m')=11 THEN 'November'
        ELSE 'Desember' END bln
    FROM tb_transaksi t 
    LEFT JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan 
    WHERE t.id_transaksi = " . $_GET['id_transaksi'] . "");
    while ($data = mysqli_fetch_assoc($q)) {
        $no++;
        $nama_pelanggan = $data['nama_pelanggan'];
        $alamat = $data['alamat'];
        $no_telp = $data['no_telp'];
        $nama_barang = $data['nama_barang'];
        $alamat_brg = $data['alamat_brg'];
        $jumlah = $data['jumlah'];
        $tanggal_ambil = $data['tgl'] . " " . $data['bln'] . " " . $data['thn'];
    }
?>
<table cellpadding="0" align="center" width="30%" style="font-family:courier, courier new, serif;">
    <tr>
        <td colspan="3"><h2 style="text-align: center;">LAPORAN PENGIRIMAN</h2></td>
    </tr>
</table>
<table style="font-family:courier, courier new, serif;" align="center">
    <tr>
        <td>Nama Pengirim</td>
        <td>:</td>
        <td><?php echo $nama_pelanggan; ?></td>
    </tr>
    <tr>
        <td>No. Telepon</td>
        <td>:</td>
        <td><?php echo $no_telp; ?></td>
    </tr>
    <tr>
        <td colspan="3" width="70%"><hr></td>
    </tr>
    <tr>
        <td>Nama Barang</td>
        <td>:</td>
        <td><?php echo $nama_barang; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $alamat_brg; ?></td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><?php echo $jumlah; ?></td>
    </tr>
    <tr>
        <td>Tanggal Diantar</td>
        <td>:</td>
        <td><?php echo $tanggal_ambil; ?></td>
    </tr>
    <tr>
        <td colspan="3" width="70%"><hr></td>
    </tr>
    <tr>
        <td colspan="3">
            <p style="text-align: center;">Terima Kasih</p>
        </td>
    </tr>   
</table>
<script>
    window.print();
</script>

</body>
</html>