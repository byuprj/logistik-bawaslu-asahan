<?php 
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$user_type = $_POST['user_type']; // Tambahkan ini untuk mendapatkan tipe user dari form login

// Query untuk memeriksa username, password, dan tipe pengguna
$query = "SELECT * FROM tb_user WHERE username='$username' AND password='$password' AND role='$user_type'";
$login = mysqli_query($koneksi, $query);

// Cek apakah query berhasil dijalankan
if($login === false){
    die("Query gagal: " . mysqli_error($koneksi)); // Menampilkan error jika query gagal
}

$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['user_type'] = $user_type; // Simpan tipe user di session
	$_SESSION['status'] = "login";

	// Redirect sesuai dengan tipe pengguna
	if($user_type == "admin"){
		header("location:../menu/index.php"); // Admin diarahkan ke dashboard admin
	} else if($user_type == "karyawan"){
		header("location:../menu/karyawan.php"); // Karyawan diarahkan ke dashboard karyawan
	}
} else {
	header("location:../index.php?pesan=gagal"); // Jika login gagal
}

?>
