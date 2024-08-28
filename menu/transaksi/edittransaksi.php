<?php
	if(!empty($_POST['simpan']) && $_POST['simpan'] == 'edit'){
		$id_transaksi = $_POST['id_transaksi'];
		$id_pelanggan = $_POST['id_pelanggan'];
		$nama_barang = $_POST['nama_barang'];
		$alamat_brg = $_POST['alamat_brg'];
		$jumlah = $_POST['jumlah'];
		$tanggal_ambil = $_POST['tanggal_ambil'];

		// Update data transaksi
		mysqli_query($koneksi, "UPDATE tb_transaksi SET id_pelanggan = '$id_pelanggan', nama_barang = '$nama_barang', alamat_brg = '$alamat_brg', jumlah = '$jumlah', tanggal_ambil = '$tanggal_ambil' WHERE id_transaksi = '$id_transaksi'");
		
		echo "<script>
			document.location='?menu=transaksi/berhasil&pesan=berhasil';
			</script>";
	}

	$transaksi = []; // Deklarasi array kosong untuk transaksi jika bukan edit mode
	if(!empty($_GET['opsi']) && $_GET['opsi'] == 'edit'){
		$id_transaksi = $_GET['id_transaksi'];
		$result = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'");
		$transaksi = mysqli_fetch_assoc($result);
	}
?>

<script type="text/javascript">
	function kalender(){
		var kalender=new dhtmlXCalendarObject("tanggal");
		kalender.hideTime();
		kalender.setDateFormat("%Y-%m-%d");
		kalender.loadUserLanguage("de");
	}
	window.onload=kalender; 
</script> 

<div class="content">
	<div class="tabel">
		<table width="100%">
			<tr>
				<td><h5>Edit Transaksi</h5></td>
			</tr>
		</table>
		<br>

		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="menu" value="transaksi/edittransaksi">
			<input type="hidden" name="id_transaksi" value="<?php echo isset($transaksi['id_transaksi']) ? $transaksi['id_transaksi'] : ''; ?>">
			<table width="100%" cellpadding="10">
				<tr>
					<td>Nama Pengirim</td>
					<td>Nama Barang</td>
				</tr>
				<tr>
					<td>
						<select name="id_pelanggan" class="form-input" required>
							<option value=""></option>
							<?php
								$q = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
								while ($data = mysqli_fetch_assoc($q)) {
							?>
								<option value="<?php echo $data['id_pelanggan'];?>"
								<?php
									if (isset($transaksi['id_pelanggan']) && $transaksi['id_pelanggan'] == $data['id_pelanggan']) {
										echo 'selected';
									}	
								?>
								><?php echo $data['nama_pelanggan']?></option>
							<?php
								}
							?>
						</select>
					</td>
					<td>
						<select name="nama_barang" class="form-input" required>
							<option value=""></option>
							<?php
								$q = mysqli_query($koneksi, "SELECT * FROM tb_barang");
								while ($data = mysqli_fetch_assoc($q)) {
							?>
								<option value="<?php echo $data['nama_barang'];?>"
								<?php
									if (isset($transaksi['nama_barang']) && $transaksi['nama_barang'] == $data['nama_barang']) {
										echo 'selected';
									}	
								?>
								><?php echo $data['nama_barang']?></option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>Jumlah</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="alamat_brg" id="alamat_brg" class="form-input" value="<?php echo isset($transaksi['alamat_brg']) ? $transaksi['alamat_brg'] : ''; ?>" required>
					</td>
					<td>
						<input type="text" name="jumlah" id="jumlah" class="form-input" value="<?php echo isset($transaksi['jumlah']) ? $transaksi['jumlah'] : ''; ?>" required>
					</td>
				</tr>
				<tr>
					<td>Tanggal Diantar</td>
				</tr>
				<tr>
					<td>
						<div class="input-group mb-1 input-group-md">
							<input type="text" name="tanggal_ambil" id="tanggal" class="form-control" style="border-radius: 0;" value="<?php echo isset($transaksi['tanggal_ambil']) ? $transaksi['tanggal_ambil'] : ''; ?>" required>
							<div class="input-group-append">
							      <button type="button" class="calendar btn-blue"><i class="la la-calendar"></i></button>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<button class="button btn-blue" name="simpan" value="edit">Simpan</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
