<?php
include "koneksi.php";
$koneksiObj = new Koneksi();
$koneksi = $koneksiObj->ambilKoneksi();

if($koneksi->connect_error){
	die("Koneksi gagal : ".$koneksi->connect_error);
}else{
	//echo "Koneksi Sukses !";
}

$query = "delete from data_mhs where nim = ".$_GET["nim"];
//echo "<br><br>" . $query;

if ($koneksi->query($query) == true){
	echo "<br><hr>Data Mahasiswa dengan NIM '" . $_GET["nim"].
	"' sudah dihapus.<hr>";
}else{
	echo "error : " . $query . " -> " . $koneksi->error;
}
$koneksi->close();
?>
<form action="main.php" method="post">
<input type="submit" value="Lihat Data">
</form>