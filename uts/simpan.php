<title>Aplikasi Data Mahasiswa</title>
<?php
include "koneksi.php";
$koneksiObj = new Koneksi();
$koneksi = $koneksiObj->ambilKoneksi();

if($koneksi->connect_error){
	die("Koneksi gagal : ".$koneksi->connect_error);
}else{
	//echo "Koneksi Sukses !";
}


$query = "insert into data_mhs values (
		".$_POST["nim"].",
		'".$_POST["nama"]."',
		'".$_POST["jurusan"]."')";

if(isset($_POST['submit'])){
	if(empty($_POST['nim'])) {
		echo "<br><hr>NIM tidak boleh kosong.";
	} else if(!is_numeric($_POST['nim'])) {
		echo "<br><hr>NIM harus angka.";
	} else if(strlen($_POST['nim']) != 8) {
		echo "<br><hr>NIM harus berjumlah 8 angka.";
	} else if($koneksi->query($query) == true){
		echo "<br><hr>Data Mahasiswa dengan NIM '" . $_POST["nim"].
		"' sudah tersimpan.";
	} else {
		echo "error : " . $query . " -> " . $koneksi->error;
	}
}
$koneksi->close();
?>
<form action="tambah.php" method="post">
<input type="submit" value="Kembali">
</form>
<hr>
<form action="main.php" method="post">
<input type="submit" value="Lihat Data">
</form>
