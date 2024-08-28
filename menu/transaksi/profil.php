<div class="content">
	<?php
		$nama_peminjam = "";
		$foto = "";
		$nip = "";
		$q = mysqli_query($koneksi, "SELECT * FROM tb_peminjam WHERE id_peminjam = '" . $_GET['id_peminjam'] . "'");
		while ($data = mysqli_fetch_assoc($q)) {
			$nama_peminjam = $data['nama_peminjam'];
			$foto = $data['foto'];
			$nip = $data['nip'];
		}

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
		<div class="row">
			<div class="col-md-4">
				<div class="box-profil">
					<center>
						<img src="../asset/img/peminjam/<?php echo $foto; ?>">
					</center>
					<table style="text-align: center; width: 100%;" cellpadding="5">
						<tr>
							<td class="nama" colspan="2"><?php echo $nama_peminjam; ?></td>
						</tr>
						<tr>
							<td class="nip" colspan="2">NIP : <?php echo $nip; ?></td>
						</tr>
						<tr>
							<td class="a" align="right">
								<button class="button btn-blue" onclick="document.location.href='?menu=data-peminjam/editpeminjam&id_peminjam=<?php echo $_GET['id_peminjam']; ?>&opsi=edit'"><i class="la la-edit"></i> Edit</button>
							</td>
							<td align="left">
								<button class="button btn-grey" onclick="document.location.href='?menu=peminjaman/cari'"><i class="la la-angle-left"></i> Back</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-lg">
				<table width="100%">
					<tr>
						<td><h5>Data Peminjaman</h5></td>
						<td align="right"><button class="button btn-blue" onclick="document.location.href='?menu=peminjaman/inputpeminjaman&id_peminjam=<?php echo $_GET['id_peminjam']; ?>'"><i class="la la-plus"></i> Input</button></td>
					</tr>
				</table>
				<br>

				<table class="table_data" width="100%">
					<thead>
						<td>No</td>
						<td>Nama Inventaris</td>
						<td>Jumlah Dipinjam</td>
						<td>Tanggal Pinjam</td>
						<td>Status</td>
						<td>Opsi</td>
					</thead>
					<tbody>
						<?php
							$no = 0;
							$q = mysqli_query($koneksi, 
			"SELECT
		a.id_peminjaman, a.id_peminjam, a.id_inventaris, a.jumlah, 
		a.tanggal_pinjam, a.status, a.tanggal_kembali, b.nama_inventaris,
		
		DATE_FORMAT(a.tanggal_pinjam, '%d') AS tgl,
		DATE_FORMAT(a.tanggal_pinjam, '%Y') AS thn,
		CASE
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=01 THEN 'Januari'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=02 THEN 'Februari'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=03 THEN 'Maret'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=04 THEN 'April'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=05 THEN 'Mei'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=06 THEN 'Juni'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=07 THEN 'Juli'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=08 THEN 'Agustus'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=09 THEN 'September'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=10 THEN 'Oktober'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=11 THEN 'November'
			WHEN DATE_FORMAT(a.tanggal_pinjam, '%m')=12 THEN 'Desember' END bln,
			
		DATE_FORMAT(a.tanggal_kembali, '%d') AS tanggal,
		DATE_FORMAT(a.tanggal_kembali, '%Y') AS tahun,
		CASE
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=01 THEN 'Januari'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=02 THEN 'Februari'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=03 THEN 'Maret'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=04 THEN 'April'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=05 THEN 'Mei'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=06 THEN 'Juni'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=07 THEN 'Juli'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=08 THEN 'Agustus'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=09 THEN 'September'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=10 THEN 'Oktober'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=11 THEN 'November'
			WHEN DATE_FORMAT(a.tanggal_kembali, '%m')=12 THEN 'Desember' END bulan
	FROM tb_peminjaman a 
		LEFT JOIN tb_inventaris b ON a.id_inventaris = b.id_inventaris WHERE a.id_peminjam = '" . $_GET['id_peminjam'] . "'");

							while ($data = mysqli_fetch_assoc($q)) {
								$no++;
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['nama_inventaris']; ?></td>
								<td><?php echo $data['jumlah']; ?></td>
								<td><?php echo $data['tgl'] . " " . $data['bln'] . " " . $data['thn']; ?></td>
								<td>
									<small
										<?php if ($data['status'] == 'Dipinjam') {
										echo "class='badge badge-warning' style='color: #fff;'";
									}else{
										echo "class='badge badge-success'";
									}?>>
									<?php echo $data['status']; ?>
									</small>
									<p>
										<?php if ($data['status'] == 'Dikembalikan') {
										echo "Pada : ";
									}
									echo $data['tanggal'] . " " . $data['bulan'] . " " . $data['tahun']; ?>
									</p>
								</td>
								<td width="150">
									<?php
										if ($data['status'] == 'Dipinjam') {
									?>
										<a href="?menu=peminjaman/kembalikan&id_peminjaman=<?php echo $data['id_peminjaman']; ?>&id_peminjam=<?php echo $data['id_peminjam']; ?>&id_inventaris=<?php echo $data['id_inventaris']; ?>&jumlah=<?php echo $data['jumlah']; ?>&opsi=kembalikan" class="badge badge-danger">Kembalikan</a>
									<?php
										}
									?>
									<!--<a href="?menu=peminjaman/editpeminjaman&id_peminjaman=<?php echo $data['id_peminjaman']; ?>&id_peminjam=<?php echo $data['id_peminjam']; ?>&opsi=edit" class="opsi"><i class="la la-edit"></i></a>-->
									<a href="?menu=peminjaman/inputpeminjaman&id_peminjaman=<?php echo $data['id_peminjaman']; ?>&id_peminjam=<?php echo $data['id_peminjam']; ?>&opsi=hapus" onclick="return konfirmasi();" class="opsi"><i class="la la-trash-alt"></i></a>
								</td>
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>