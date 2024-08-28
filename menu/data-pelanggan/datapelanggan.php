<div class="content">
	<?php
		if(isset($_GET['pesan'])){
			$pesan = $_GET['pesan'];
			if($pesan == "input"){
				echo "<div class='alert alert-info'>Data berhasil di input!
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span></button>
				</div>";
			}else if($pesan == "edit"){
				echo "<div class='alert alert-info'>Data berhasil di edit!
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span></button>
				</div>";
			}else if($pesan == "hapus"){
				echo "<div class='alert alert-info'>Data berhasil di hapus!
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span></button>
				</div>";
			}
		}
	?>
	<script type="text/javascript">
		function konfirmasi() {
			var tanya = confirm("Apakah anda yakin ingin menghapus data ini?");
			if (tanya)
				return true
			else
				return false
		}
	</script>

	<div class="tabel">
		<table width="100%">
			<tr>
				<td><h5>Data Pelanggan</h5></td>
				<td width="10%">
					<a class="button btn-blue" href="data-pelanggan/cetakpelanggan.php" target="_blank"><i class="la la-print"></i> Cetak</button>
				</td>
				<td align="right" width="12%">
					<button class="button btn-blue" onclick="document.location.href='?menu=data-pelanggan/inputpelanggan'"><i class="la la-plus"></i> Input</button>
				</td>
			</tr>
		</table>
		<br>

		<table class="table_data" width="100%">
			<thead>
				<td>No</td>
				<td>Nama pengirim</td>
				<td>Jenis Kelamin</td>
				<td>No. Telepon</td>
				<td>Alamat</td>
				<td>Bergabung Pada</td>
				<td>Opsi</td>
			</thead>
			<tbody>
				<?php
					$no = 0;
					$q = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan ORDER BY nama_pelanggan ASC");
					while ($data = mysqli_fetch_assoc($q)) {
						$no++;
				?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['nama_pelanggan']; ?></td>
						<td><?php echo $data['jenis_kelamin']; ?></td>
						<td><?php echo $data['no_telp']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td><?php echo $data['bergabung_pada']; ?></td>
						<td>
							<a href="?menu=data-pelanggan/editpelanggan&id_pelanggan=<?php echo $data['id_pelanggan']; ?>&opsi=edit" class="opsi"><i class="la la-edit"></i></a>
							<a href="?menu=data-pelanggan/inputpelanggan&id_pelanggan=<?php echo $data['id_pelanggan']; ?>&opsi=hapus" onclick="return konfirmasi();" class="opsi"><i class="la la-trash-alt"></i></a>
						</td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>