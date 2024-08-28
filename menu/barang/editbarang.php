<?php
	$simpan = 'simpan';  // Default action is to 'simpan'
	$nama_barang = '';
	$banyak_barang = '';
	$id_barang = ''; // Default empty ID
	
	// Check if we are editing
	if(!empty($_GET['opsi']) && $_GET['opsi'] == 'edit'){
		$id_barang = $_GET['id_barang'];
		$result = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
		$transaksi = mysqli_fetch_assoc($result);

		$nama_barang = $transaksi['nama_barang']; // Populate the form with existing data
		$banyak_barang = $transaksi['banyak_brg'];
		$simpan = 'edit';  // Change action to 'edit'
	}

	if(!empty($_POST['simpan'])){
		$id_barang = $_POST['id_barang'];
		$nama_barang = $_POST['nama_barang'];
		$banyak_barang = $_POST['banyak_brg'];

		if ($_POST['simpan'] == 'simpan') {
			// Insert new data into tb_barang
			mysqli_query($koneksi, "INSERT INTO tb_barang (nama_barang, banyak_brg) VALUES ('$nama_barang','$banyak_barang')");
		} elseif($_POST['simpan'] == 'edit') {
			// Update existing data in tb_barang
			$result = mysqli_query($koneksi, "UPDATE tb_barang SET nama_barang = '$nama_barang', banyak_brg = '$banyak_barang' WHERE id_barang = '$id_barang'");
		}
		
		echo "<script>
			document.location='?menu=barang/daftarbarang&pesan=edit';
		</script>";
	}
?>

<div class="content">
	<div class="tabel">
		<table width="100%">
			<tr>
				<td><h5>Input Barang</h5></td>
			</tr>
		</table>
		<br>

		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="menu" value="barang/inputbarang">
			<input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>">
			<table width="100%" cellpadding="10">
				<tr>
					<td>Nama Barang</td>
					<td>Jumlah Barang</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="nama_barang" class="form-input" value="<?php echo htmlspecialchars($nama_barang); ?>" required>
					</td>
					<td colspan="2">
						<input type="number" name="banyak_brg" class="form-input" value="<?php echo htmlspecialchars($banyak_barang); ?>" required>
					</td>
				</tr>
				<tr>
					<td>
						<button class="button btn-blue" name="simpan" value="<?php echo $simpan; ?>">
							<?php echo ucfirst($simpan); ?>
						</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
