<?php
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>

	<title>Login | Aplikasi Logistik</title>
	<link rel="shortcut icon" type="image/png/jpeg" href="../asset/img/logo-bawaslu.png">
	<link rel="stylesheet" type="text/css" href="asset/css/login.css?<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="asset/plugin/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asset/plugin/line-awesome/css/line-awesome.min.css">

</head>
<body>
	<form class="login" method="POST" action="koneksi/aksi-login.php">
		<h2 class="text-center mb-5">Aplikasi Logistik</h2>

		<div class="form-group">
			<select class="form-control" name="user_type" required="">
				<option value="">Pilih Login Sebagai</option>
				<option value="karyawan">Karyawan</option>
				<option value="admin">Admin</option>
			</select>
		</div>

		<div class="username">
			<input class="input form-control" type="text" name="username" placeholder="Username" required="">
		</div>
		<div class="password">
			<input class="input form-control" type="password" name="password" placeholder="Password" required="">
		</div>
		<div>
			<button class="tombol btn btn-primary w-100">SIGN IN</button>
		</div>
	</form>

	<?php
		if ($_GET['pesan']) {
			if($_GET['pesan'] == "gagal"){

				echo "<div align='center' style='padding: 15px; color: #ff3b8d;'>Login gagal, Username atau Password salah!</div>";

			}
		}
	?>
	<footer>
		<center>
			<p class="cp"><i class="la la-copyright"></i> 2024 | LOGISTIK BAWASLU</p>
		</center>
	</footer>
</body>
</html>
