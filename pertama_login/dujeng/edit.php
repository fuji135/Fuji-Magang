<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		$id = $_GET['id'];

		$query = mysqli_query($koneksi,"SELECT * FROM Mahasiswa WHERE id_Mahasiswa ='$id'");
		$row = mysqli_fetch_array($query);

	}else{
		header("location:index.php");
	}
}else{
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<title>Data Mahasiswa TI 3</title>
</head>
<body>
	<div class="container mt-5 ">
		<center class="mb-5" ><h2>Data Mahasiswa TI 3</h2></center>
		<hr>
		<form action="edit_act.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama Lengkap Mahasiswa</label>
				<input type="text" name="nama_lengkap_Mahasiswa" class="form-control" value="<?php echo $row['Mahasiswa_nama']; ?>" >
				<input type="hidden" name="id" class="form-control" value="<?php echo $row['id_Mahasiswa']; ?>" >
			</div>
			<div class="mb-3">
				<label class="form-label">Kelas</label>
				<input type="text" name="kelas" class="form-control" value="<?php echo $row['Mahasiswa_kelas']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Alamat</label>
				<textarea class="form-control" name="alamat" rows="3"><?php echo $row['Mahasiswa_alamat']; ?></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Pas Foto Terkeren</label>
				<input type="file" name="Mahasiswa_foto" class="form-control">
				<br>
				<?php 
				if ($row['id_Mahasiswa'] == "") { ?>
					<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+TERKEREN" style="width:100px;height:100px;">
				<?php }else{ ?>
					<img src="foto/<?php echo $row['Mahasiswa_foto']; ?>" style="width:100px;height:100px;">
				<?php } ?>
			</div>
			<div class="mb-3">
				<button class="btn btn-success" type="submit">Submit</button>
				<a href="index.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>
		
	</div>
</body>
</html>