<?php
	error_reporting(0);

	if (!empty($_POST['simpan'])) {
		if ($_POST['simpan'] == 'simpan') {
			$id_barang = $_POST['id_barang'];
			$nama_barang = $_POST['nama_barang'];
			$banyak_barang = $_POST['banyak_brg'];

			mysqli_query($koneksi, "INSERT INTO tb_barang (nama_barang, banyak_brg) VALUES ('$nama_barang','$banyak_barang')");
			
            echo "<script>
			document.location='?menu=barang/daftarbarang&pesan=input';
			</script>";
		}
	}

	if (!empty($_GET['opsi'])) {
		if ($_GET['opsi'] == 'hapus') {
			$id_transaksi = $_GET['id_barang'];
			mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang = '$id_barang'");

			echo "<script>
				document.location='?menu=barang/daftarbarang&pesan=hapus';
				</script>";
		}
	}	
?>

<div class="content">
	<div class="tabel">
		<table width="100%">
			<tr>
				<td><h5>Input Data Barang</h5></td>
				<td align="right"><button class="button btn-grey" onclick="document.location.href='?menu=barang/daftarbarang'"><i class="la la-angle-left"></i> Kembali</button></td>
			</tr>
		</table>
		<br>

		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="menu" value="data-barang/inputbarang">
			<input type="hidden" name="id_barang" value="<?php echo $_GET['id_barang']; ?>">
			<table width="100%" cellpadding="10">
				<tr>
					<td colspan="2">Nama Barang</td>
					<td>Banyak Barang</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="nama_barang" class="form-input" placeholder="Nama barang" required>
					</td>
					<td rowspan="3">
						<textarea name="banyak_brg" class="form-input" placeholder="banyak barang" required rows="5"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<button class="button btn-blue" name="simpan" value="simpan">Simpan</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>