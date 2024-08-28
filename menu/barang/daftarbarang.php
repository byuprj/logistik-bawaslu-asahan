<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'bawaslu');

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses hapus data
if (isset($_GET['opsi']) && $_GET['opsi'] == 'hapus') {
    $id_barang = $_GET['id_barang'];
    $query_hapus = "DELETE FROM tb_barang WHERE id_barang = '$id_barang'";
    $result_hapus = mysqli_query($koneksi, $query_hapus);

    if ($result_hapus) {
        echo "<script>alert('Barang berhasil dihapus!'); document.location='?menu=barang/daftarbarang';</script>";
    } else {
        echo "<script>alert('Gagal menghapus barang!');</script>";
    }
}
?>

<div class="content">
    <div class="tabel">
        <table width="100%">
            <tr>
                <td><h5>Data Barang</h5></td>
                <td align="right" width="12%">
                    <button class="button btn-blue" onclick="document.location.href='?menu=barang/inputbarang'"><i class="la la-plus"></i> Input</button>
                </td>
            </tr>
        </table>
        <br>
        <div class="tabel">
            <table class="table_data">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = mysqli_query($koneksi, "SELECT * FROM tb_barang");
                    while ($data = mysqli_fetch_assoc($q)) {
                    ?>
                        <tr>
                            <td data-label="Nama Barang"><?php echo htmlspecialchars($data['nama_barang']); ?></td>
                            <td data-label="Jumlah Barang"><?php echo htmlspecialchars($data['banyak_brg']); ?></td>
                            <td data-label="Opsi">
                                <a href="?menu=barang/editbarang&id_barang=<?php echo $data['id_barang']; ?>&opsi=edit" class="opsi"><i class="la la-edit"></i></a>
                                <a href="?menu=barang/daftarbarang&id_barang=<?php echo $data['id_barang']; ?>&opsi=hapus" onclick="return konfirmasi();" class="opsi"><i class="la la-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    mysqli_close($koneksi); // Jangan lupa untuk menutup koneksi
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function konfirmasi() {
    return confirm('Apakah Anda yakin ingin menghapus barang ini?');
}
</script>
