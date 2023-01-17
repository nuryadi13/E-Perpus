<?php
// $namafolder = "gambar_anggota/"; //tempat menyimpan file

include "../conn.php";
include "fungsi.php";
include "decrypt.php";


	// $nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];
	
  // $nim= encipher($nim, $key, true);
  // "</br>";
  $nama = encipher($nama, $key, true);
  "</br>";
  $username = encipher($username, $key, true);
  "</br>";
  $password = encipher($password, $key, true);
  "</br>";
  $jk= encipher($jk, $key, true);
  "</br>";
  $kelas = encipher($kelas, $key, true);
  "</br>";
  $alamat = encipher($alamat, $key, true);
  "</br>";

	$sql = "INSERT INTO data_anggota(id,nama,username,password,jk,kelas,alamat) VALUES
            ('','$nama','$username','$password','$jk','$kelas','$alamat')";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

//deskripsi

  // $nama= decrypt($nama, $key, false);
  // "</br>";
  // $data = "SELECT $username,$password FROM data_anggota";
  // $res = mysqli_query($conn, $data) or die(mysqli_error($conn));
  // $username = decrypt($username, $key, false);
  // $password = decrypt($password, $key, false);

echo "Data anda telah berhasil diinput, Masukkan Username dan password anda di <span><a href='login.html'><b> Disini </b></a></span>";
echo "<h3><a href='login.html'>Klik Disini</a>  untuk Login </h3>";
