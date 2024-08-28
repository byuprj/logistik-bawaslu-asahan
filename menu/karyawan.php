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
	    <style>
        .marquee-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
        }
        
        .marquee {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 15s linear infinite;
            font-size: 24px;
            font-weight: bold;
        }
		.marquee img {
            vertical-align: middle; /* Agar logo sejajar dengan teks */
            margin-right: 10px; /* Jarak antara logo dan teks */
            height: 40px; /* Sesuaikan ukuran logo */
        }
        
        @keyframes marquee {
            from { transform: translateX(0%); }
            to { transform: translateX(-100%); }
        }
    </style>

</head>
<body style="font-family: roboto-regular; ">
	<div class="contain">
		<div class="menu-bar">
			<div class="container">
			<div class="marquee-container mt-3">
    				<div class="marquee"><img src="../asset/img/logo-bawaslu.png" alt="Logo">BADAN PENGAWAS PEMILIHAN UMUM KABUPATEN ASAHAN</div>
					</div>
			</div>
		</div>
	</div>
	<div class="wrap-content">
		<div>
			<?php
			if(!empty($_GET['menu'])){
				include($_GET['menu'].'.php');
			}else{
				include('home\beranda1.php');
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