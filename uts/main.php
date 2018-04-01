<title>Aplikasi Data Mahasiswa</title>
<center><h1>Aplikasi Data Mahsiswa</h1>
<hr>

<form action="tambah.php" method="post">
<input type="submit" value="Tambah Data">
</form>
</center>
<?php
	include "koneksi.php";
	$koneksiObj = new Koneksi();
	$koneksi = $koneksiObj->ambilKoneksi();

	if ($koneksi->connect_error){
		die("Koneksi gagal : ".$koneksi->connect_error);
	} else {
		//echo "Koneksi Sukses !";
	}
	$qry = "select * from data_mhs";
	$data = $koneksi->query($qry);
?>
<center>
<table border="1">
	<tr>
		<th>NIM</th>
		<th>NAMA</th>
		<th>JURUSAN</th>
		<th>OPSI</th>
	</tr>
	
	<?php
		if ($data->num_rows <= 0){
			echo "<tr><td>";
			echo "DATA NIHIL";
			echo "</td></tr>";
		} else {
			while ($row = $data->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row["nim"]."</td>";
				echo "<td>".$row["nama"]."</td>";
				echo "<td>".$row["jurusan"]."</td>";
				echo '<td><a href="edit.php?nim='. $row["nim"] .'">Edit</a> -||- 
						<a href="hapus.php?nim='. $row["nim"] .'">Hapus</a>';
				//echo '<td><a href="hapus.php?nim='. $row["nim"] .'">Hapus</a>';
				echo "<tr>";
			}
		}
	?>
</table>
</center>