<?php
	session_start();
	include('..\koneksi\koneksi.php');

	if (empty($_SESSION['username'])) {
		header("location:../index.php");
	}

	$nama = "";
	$level = "";
	$username = $_SESSION["username"];
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
	while ($data = mysqli_fetch_assoc($sql)) {
		$nama = $data['nama_user'];
	}
?>
<!DOCTYPE html>
<html>
<head>

	<title>LOGISTIK BAWASLU</title>

	<link rel="shortcut icon" type="image/png/jpeg" href="../asset/img/logo-bawaslu.png">
	<link rel="stylesheet" type="text/css" href="../asset/css/menu.css?<?php echo time()?>">
	<link rel="stylesheet" type="text/css" href="../asset/plugin/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/plugin/bootstrap/css/icheck-bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/plugin/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/plugin/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/plugin/DataTables (1)/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/plugin/dhtmlxCalendar/codebase/dhtmlxcalendar.css">

	<script type="text/javascript" src="../asset/plugin/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../asset/plugin/DataTables (1)/datatables.min.js"></script>
	<script type="text/javascript" src="../asset/plugin/dhtmlxCalendar/codebase/dhtmlxcalendar.js"></script>

	<script type="text/javascript">
		$(function(){
			$('.table_data').DataTable({
				"language": {
		            "lengthMenu": "Show _MENU_ ",
		            "zeroRecords": "Maaf, data tidak ada!",
		            "info": "Halaman ke _PAGE_ dari _PAGES_ halaman",
		            "infoEmpty": "Data tidak tersedia!",
		            "infoFiltered": "(filtered from _MAX_ total records)"
				}
			});
		});
	</script>

</head>
<body style="font-family: roboto-regular;">
	<div class="contain">
		<div class="menu-bar">
			<div class="container">
				<ul class="nav page">
					<li class="nav">
						<a href="?menu=home/beranda2" class="judul-menu"><i class="la la-home"></i> Home</a>
					</li>

					<li class="nav">
						<a href="?menu=data-pelanggan/datapelanggan" class="judul-menu"><i class="la la-user"></i>Pengirim</a>
					</li>

					<li class="nav">
						<a href="?menu=barang/daftarbarang" class="judul-menu"><i class="la la-truck"></i></i> Tambah Barang</a>
					</li>

					<li class="nav">
						<div class="dropdown">
							<a href="" class="judul-menu" id="dropdownMenuButton" data-toggle="dropdown"><i class="la la-book"></i> Transaksi <i class="arrow la la-angle-down pull-right"></i></a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="?menu=transaksi/inputtransaksi">Buat Transaksi</a>
								<a class="dropdown-item" href="?menu=transaksi/daftartransaksi">Riwayat Transaksi</a>
							</div>
						</div>
					</li>

					<li class="nav">
						<a href="?menu=diagram/diagram" class="judul-menu"><i class="la la-chart-bar"></i>Grafik</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="wrap-content">
		<div>
			<?php
			if(!empty($_GET['menu'])){
				include($_GET['menu'].'.php');
			}else{
				include('home\beranda2.php');
			}
			?>
		</div>
	</div>
	
	<div class="footer">
		<div class="copyright">Copyright <i class="la la-copyright"></i> (Universitas)</div>
		<div class="made">Hand Crafted & Made With <i class="fa fa-heart-o"></i> </div>
	</div>
</body>
</html>