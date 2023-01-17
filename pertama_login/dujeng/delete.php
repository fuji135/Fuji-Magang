<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		// Mengambil ID diURL
		$id = $_GET['id'];

		// Mengambil data Mahasiswa_foto didalam table Mahasiswa
		$get_foto = "SELECT Mahasiswa_foto FROM Mahasiswa WHERE id_Mahasiswa='$id'";
		$data_foto = mysqli_query($koneksi, $get_foto); 
        // Mengubah data yang diambil menjadi Array
		$foto_lama = mysqli_fetch_array($data_foto);

        // Menghapus Foto lama didalam folder FOTO
		unlink("foto/".$foto_lama['Mahasiswa_foto']);    

		// Mengapus data Mahasiswa berdasarkan ID
		$query = mysqli_query($koneksi,"DELETE FROM Mahasiswa WHERE id_Mahasiswa='$id'");
		if ($query) {
			header("location:index.php?pesan=hapus");
		}else{
			header("location:index.php?pesan=gagalhapus");
		}
		
	}else{
		// Apabila ID nya kosong maka akan dikembalikan kehalaman index
		header("location:index.php");
	}
}else{
	// Jika tidak ada Data ID maka akan dikembalikan kehalaman index
	header("location:index.php");
}

?>