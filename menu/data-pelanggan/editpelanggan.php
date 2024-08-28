<?php
	if(!empty($_POST['simpan'])){
		if ($_POST['simpan'] == 'simpan') {
			$nama_pelanggan = $_POST['nama_pelanggan'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$no_telp = $_POST['no_telp'];
			$alamat = $_POST['alamat'];
			$bergabung_pada = $_POST['bergabung_pada'];

			mysqli_query($koneksi, "INSERT INTO tb_pelanggan (nama_pelanggan, jenis_kelamin, no_telp, alamat, bergabung_pada) VALUES ('$nama_pelanggan', '$jenis_kelamin', '$no_telp', '$alamat', '$bergabung_pada')");

		echo "<script>
			document.location='?menu=data-pelanggan/datapelanggan&pesan=edit';
			</script>";
		}
		elseif($_POST['simpan'] == 'edit'){
			$id_pelanggan = $_POST['id_pelanggan'];
			$nama_pelanggan = $_POST['nama_pelanggan'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$no_telp = $_POST['no_telp'];
			$alamat = $_POST['alamat'];
			$bergabung_pada = $_POST['bergabung_pada'];

			$result = mysqli_query($koneksi, "UPDATE tb_pelanggan SET nama_pelanggan = '$nama_pelanggan', jenis_kelamin = '$jenis_kelamin', no_telp = '$no_telp', alamat = '$alamat', bergabung_pada = '$bergabung_pada' WHERE id_pelanggan = '$id_pelanggan'");
			echo 
			"<script>
			document.location='?menu=data-pelanggan/datapelanggan&pesan=edit';
			</script>";
		}
	}
	$simpan = 'simpan';
	if(!empty($_GET['opsi'])){
		if($_GET['opsi'] == 'edit'){
			$id_pelanggan = $_GET['id_pelanggan'];
			$result = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");
			$pelanggan = mysqli_fetch_assoc($result);
			$simpan = 'edit';
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
				<td><h5>Edit Data Pengirim</h5></td>
				<td align="right"><button class="button btn-grey" onclick="document.location.href='?menu=data-pelanggan/datapelanggan'"><i class="la la-angle-left"></i> Kembali</button></td>
			</tr>
		</table>
		<br>

		<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="menu" value="data-pelanggan/editpelanggan">
			<input type="hidden" name="id_pelanggan" value="<?php echo $_GET['id_pelanggan']; ?>">
			<table width="100%" cellpadding="10">
				<tr>
					<td colspan="2">Nama pengirim</td>
					<td>Alamat</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="nama_pelanggan" class="form-input" placeholder="Nama Pelanggan" value="<?php echo $pelanggan['nama_pelanggan']; ?>" required>
					</td>
					<td rowspan="3">
						<textarea name="alamat" class="form-input" placeholder="Alamat" required rows="5"><?php echo $pelanggan['alamat']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">Jenis Kelamin</td>
				</tr>
				<tr>
					<td>
						<div class="icheck-midnightblue">
							<input type="radio" name="jenis_kelamin" value="Laki-laki" id="Laki-laki" <?php if($pelanggan['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>>
							<label for="Laki-laki">Laki-laki</label>
						</div>
					</td>
					<td>
						<div class="icheck-midnightblue">
							<input type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan" <?php if($pelanggan['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>
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
						<input type="text" name="no_telp" class="form-input" placeholder="Nomor Telepon" value="<?php echo $pelanggan['no_telp']; ?>" required>
					</td>
					<td>
					<div class="input-group mb-1 input-group-md">
						<input type="text" name="bergabung_pada" id="tanggal" value="<?php echo $pelanggan['bergabung_pada']; ?>" class="form-control" style="border-radius: 0;" required>
							<div class="input-group-append">
							      <button type="button" class="calendar btn-blue"><i class="la la-calendar"></i></button>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<button class="button btn-blue" name="simpan" value="<?php echo $simpan; ?>">Simpan</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>