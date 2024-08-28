<?php
	error_reporting(0);
	if(!empty($_POST['simpan'])){
		if ($_POST['simpan'] == 'simpan') {
			$id_pelanggan = $_GET['id_pelanggan'];
			$nama_pelanggan = $_POST['nama_pelanggan'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$no_telp = $_POST['no_telp'];
			$alamat = $_POST['alamat'];
			$bergabung_pada = $_POST['bergabung_pada'];

			mysqli_query($koneksi, "INSERT INTO tb_pelanggan (nama_pelanggan, jenis_kelamin, no_telp, alamat, bergabung_pada) VALUES ('$nama_pelanggan', '$jenis_kelamin', '$no_telp', '$alamat', '$bergabung_pada')");

		echo "<script>
			document.location='?menu=transaksi/inputtransaksi&pesan=input';
			</script>";
		}
	}

	if (!empty($_GET['opsi'])) {
		if ($_GET['opsi'] == 'hapus') {
			$id_pelanggan = $_GET['id_pelanggan'];
			mysqli_query($koneksi, "DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");

			echo "<script>
				document.location='?menu=data-pelanggan/datapelanggan&pesan=hapus';
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
				<td><h5>Input Data Pelanggan</h5></td>
				<td align="right"><button class="button btn-grey" onclick="document.location.href='?menu=home/beranda1'"><i class="la la-angle-left"></i> Kembali</button></td>
			</tr>
		</table>
		<br>

		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="menu" value="data-pelanggan/inputpelanggan">
			<input type="hidden" name="id_pelanggan" value="<?php echo $_GET['id_pelanggan']; ?>">
			<table width="100%" cellpadding="10">
				<tr>
					<td colspan="2">Nama Pengirim</td>
					<td>Alamat</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="nama_pelanggan" class="form-input" placeholder="Nama Pelanggan" required>
					</td>
					<td rowspan="3">
						<textarea name="alamat" class="form-input" placeholder="Alamat" required rows="5"></textarea>
					</td>
				</tr>
			
				<tr>
					<td colspan="2">Jenis Kelamin</td>
				</tr>
				<tr>
					<td>
						<div class="icheck-midnightblue">
							<input type="radio" name="jenis_kelamin" value="Laki-laki" id="Laki-laki">
							<label for="Laki-laki">Laki-laki</label>
						</div>
					</td>
					<td>
						<div class="icheck-midnightblue">
							<input type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan" required>
							<label for="Perempuan">Perempuan</label>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">No. Telepon</td>
					<td>Bergabung Pada</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="no_telp" class="form-input" placeholder="Nomor Telepon" required>
					</td>
					<td>
						<div class="input-group mb-1 input-group-md">
							<input type="text" name="bergabung_pada" id="tanggal" value="" class="form-control" style="border-radius: 0;" required>
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