<?php
$namafolder = "gambar_anggota/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
	$jenis_gambar = $_FILES['nama_file']['type'];
	$id = $_POST['id'];
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$username = $_POST['usename'];
	$password = $_POST['password'];
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$ttl = $_POST['ttl'];
	$alamat = $_POST['alamat'];


			$sql = "INSERT INTO data_anggota(id,nim,nama,userenam,jk,kelas,alamat,foto) VALUES
            ('$id','$nim','$nama','$username','$password','$jk','$kelas','$alamat','$gambar')";
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			echo "Gambar berhasil dikirim ke direktori" . $gambar;
			echo "<h3><a href='input-anggota.php'> Input Lagi</a></h3>";
			echo "<h3><a href='anggota.php'> Data Anggota</a></h3>";
		} else {
			echo "<p>Gambar gagal dikirim</p>";
		}else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
	}else {
	echo "Anda belum memilih gambar";
}
