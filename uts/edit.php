<title>Aplikasi Data Mahasiswa</title>
<center><h2>Formulir Edit Data Mahasiswa</h2><center>
<hr>
<form action="update.php" method="post">

<?php
	include "koneksi.php";
	$koneksiObj = new Koneksi();
	$koneksi = $koneksiObj->ambilKoneksi();

	if($koneksi->connect_error){
		die("Koneksi gagal : ".$koneksi->connect_error);
	}else{
		//echo "Koneksi Sukses !";
	}

	$qry = "select * from data_mhs where nim='".$_GET["nim"]."'";
	$data = $koneksi->query($qry);
	if($data->num_rows <= 0) {
		echo "Isi Data Sesuai Prosedur";
	} else {
		while ($hasil = $data->fetch_assoc()) {
			global $nama;
			global $jurusan;
			$nama = $hasil["nama"];
			$jurusan = $hasil["jurusan"];
		}
	}
?>


<table>
<tr>
	<td>NIM </td>
	<td>: <input type="text" name="nim" readonly="true"
		value=<?php echo $_GET["nim"]; ?>></td>
</tr>
<tr>
	<td>NAMA </td>
	<td>: <input type="text" name="nama"
		value = <?php echo $nama; ?>></td>
</tr>
<tr>
	<td>JURUSAN </td>
	<td>: <input type="text" name="jurusan"
		value = <?php echo $jurusan; ?>></td>
</tr>
</table>
<hr>
	<input type="submit" value="Simpan">
</form>
<form action="main.php" method="">
	<td><input type="submit" value="Batal"></td>
</form>