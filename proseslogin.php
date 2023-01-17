<?php
include("conn.php");
include_once "fungsi.php";
include_once "decrypt.php";
date_default_timezone_set('Asia/Jakarta');

session_start();
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$jk = $_POST['jk'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
// $nama = $_POST['nama'];
  $name = encipher($nama, $key, true);
  $user = encipher($username, $key, true);
  $pass = encipher($password, $key, true);
  $kelamin = encipher($jk, $key, true);
  $kel = encipher($kelas, $key, true);
  $alt = encipher($alamat, $key, true);
//   $p= encipher($nama, $key, true);
$n = decrypt($name, $key, false);
$player = decrypt($user, $key, false);
$plain = decrypt($pass, $key, false);
$kelam = decrypt($kelamin, $key, false);
$k = decrypt($kel, $key, false);
$al = decrypt($alt, $key, false);
// $pe = decrypt($p, $key, false);
$level = $_POST['level'];

if ($level == 'admin') {

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	if (empty($username) && empty($password)) {
		header('location:login.html?error=1');
	} else if (empty($username)) {
		header('location:login.html?error=2');
	} else if (empty($password)) {
		header('location:login.html?error=3');
	} else {
		header('location:admin/index.php');

		$q = mysqli_query($conn, "select * from admin where username='$username' and password='$password'");
		$row = mysqli_fetch_array($q);

		if (mysqli_num_rows($q) == 1) {
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['username'] = $username;
			// $_SESSION['username'] = $plain;
			$_SESSION['fullname'] = $row['fullname'];
			$_SESSION['gambar'] = $row['gambar'];

			header('location:admin/index.php');
		} else {
			header('location:login.html?error=4');
		}
	}
} else {
	$user = mysqli_real_escape_string($conn, $user);
	$pass = mysqli_real_escape_string($conn, $pass);

	if (empty($user) && empty($pass)) {
		header('location:login.html?error=1');
	} else if (empty($user)) {
		header('location:login.html?error=2');
	} else if (empty($pass)) {
		header('location:login.html?error=3');
	} else {
		header('location:anggota/index.php');

		$q = mysqli_query($conn, "select * from data_anggota where username='$user' and password='$pass'");
		$row = mysqli_fetch_array($q);

		if (mysqli_num_rows($q) == 1) {
			$_SESSION['id'] = $row['id'];
			// $_SESSION['nim'] = $row['nim'];
			$_SESSION['nama'] = $n;
			// $_SESSION['nama'] = $p;
			// $_SESSION['username'] = $user;
			$_SESSION['password'] = $plain;
			$_SESSION['username'] = $player;
			$_SESSION['jk'] = $kelam;
			$_SESSION['kelas'] = $k;
			$_SESSION['alamat'] = $al;

			header('location:anggota/index.php');
		} else {
			header('location:login.html?error=4');
		}
	}
}
