<?php
include "koneksi.php";
$koneksiObj = new Koneksi();
$koneksi = $koneksiObj->ambilKoneksi();

if($koneksi->connect_error){
	die("Koneksi gagal : ".$koneksi->connect_error);
}else{
	//echo "Koneksi Sukses !";
}

$query = "update data_mhs set nama = '" . $_POST["nama"] . "', jurusan = '" . $_POST["jurusan"] . "' " .
		"where nim = " . $_POST["nim"];
		
if ($koneksi->query($query) == true){
	echo "<br><hr>Data Mahasiswa dengan NIM '" . $_POST["nim"].
	"' sudah di-update.<hr>";
}else{
	echo "error : " . $query . " -> " . $koneksi->error;
}
$koneksi->close();
?>
<form action="main.php" method="post">
<input type="submit" value="Lihat Data">
</form>