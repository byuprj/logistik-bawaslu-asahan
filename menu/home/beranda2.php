<?php
	$nama = "";
	$username = $_SESSION["username"];
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username'");
	while ($data = mysqli_fetch_assoc($sql)) {
		$nama = $data['nama_user'];
	}

	$jlh_user = 0;
	$q_user = mysqli_query($koneksi, "SELECT * FROM tb_user");
	while ($data = mysqli_fetch_assoc($q_user)) {
		$jlh_user++;
	}

	$jlh_pelanggan = 0;
	$q_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
	while ($data = mysqli_fetch_assoc($q_pelanggan)) {
		$jlh_pelanggan++;
	}

	$jlh_transaksi = 0;
	$q_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
	while ($data = mysqli_fetch_assoc($q_transaksi)) {
		$jlh_transaksi++;
	}

	$banyak_barang = 0;
	$q_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_barang");
	while ($data = mysqli_fetch_assoc($q_transaksi)) {
		$banyak_barang++;
	}

?>

<div class="notif">
	<div class='welcome'>
		<span style="float: left;">
			<h6>Selamat Datang, <?php echo $nama; ?>!</h6>
		</span>
		<button class="button btn-blue" onclick="document.location.href='../koneksi/signout.php'" style="float: right; top: 0;">Logout</button>
	</div>
</div>
<br>

<div class="dashboard">
	<div class="row">
		<div class="col-md">
			<div class="box-v2">
				<span class="icon biru">
					<i class="la la-user"></i>
				</span>
				<div class="isi">
					<h6><?php echo $jlh_user; ?></h6>
					<span>Pengguna</span>
				</div>
			</div>
		</div>
		<div class="col-md">
			<div class="box-v2">
				<span class="icon kuning">
					<i class="la la-user-friends"></i>
				</span>
				<div class="isi">
					<h6><?php echo $jlh_pelanggan; ?></h6>
					<span>Pengirim</span>
				</div>
			</div>
		</div>
		<div class="col-md">
			<div class="box-v2">
				<span class="icon hijau">
					<i class="la la-book"></i>
				</span>
				<div class="isi">
					<h6><?php echo $jlh_transaksi; ?></h6>
					<span>Transaksi</span>
				</div>
			</div>
		</div>
		<div class="col-md">
			<div class="box-v2">
				<span class="icon merah">
					<i class="la la-chart-bar"></i>
				</span>
				<div class="isi">
					<h6><?php echo $banyak_barang; ?></h6>
					<span>Grafik</span>
				</div>
			</div>
		</div>
	</div>
</div>
