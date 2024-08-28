<?php
	error_reporting(0);

	if (!empty($_POST['simpan'])) {
		if ($_POST['simpan'] == 'simpan') {
			$id_transaksi = $_POST['id_transaksi'];
			$id_pelanggan = $_POST['id_pelanggan'];
			$nama_barang = $_POST['nama_barang'];
			$alamat_brg = $_POST['alamat_brg'];
			$jumlah = $_POST['jumlah'];
			$tanggal_ambil = $_POST['tanggal_ambil'];

			mysqli_query($koneksi, "INSERT INTO tb_transaksi (id_transaksi, id_pelanggan, nama_barang, alamat_brg, jumlah, tanggal_ambil) VALUES ('$id_transaksi', '$id_pelanggan', '$nama_barang','$alamat_brg', '$jumlah', '$tanggal_ambil')");
			
		echo "<script>
			document.location='?menu=transaksi/berhasil&pesan=berhasil';
			</script>";
		}
	}

	if (!empty($_GET['opsi'])) {
		if ($_GET['opsi'] == 'hapus') {
			$id_transaksi = $_GET['id_transaksi'];
			mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'");

			echo "<script>
				document.location='?menu=transaksi/daftartransaksi&pesan=hapus';
				</script>";
		}
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
				<td><h5>Buat Transaksi</h5></td>
			</tr>
		</table>
		<br>

		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="menu" value="transaksi/inputtransaksi">
			<input type="hidden" name="id_transaksi" value="<?php echo $_GET['id_transaksi']; ?>">
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
								<option value="<?php echo $data['id_pelanggan']?>"><?php echo $data['nama_pelanggan']?></option>
							<?php
								}
							?>
						</select>
					</td>
					<td colspan="2">
					<select name="nama_barang" class="form-input" required>
							<option value=""></option>
							<?php
								$q = mysqli_query($koneksi, "SELECT * FROM tb_barang");
								while ($data = mysqli_fetch_assoc($q)) {
							?>
								<option value="<?php echo $data['nama_barang']?>"><?php echo $data['nama_barang']?></option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Alamat</td>
				</tr>
				<tr>
				<td>
						<input type="text" name="alamat_brg" id="alamat_brg" class="form-input">
					</td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>Tanggal Diantar</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="jumlah" id="jumlah" class="form-input" required>
					</td>
					<td>
						<div class="input-group mb-1 input-group-md">
							<input type="text" name="tanggal_ambil" id="tanggal" value="" class="form-control" style="border-radius: 0;" required>
							<div class="input-group-append">
							      <button type="button" class="calendar btn-blue"><i class="la la-calendar"></i></button>
							</div>
						</div>
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