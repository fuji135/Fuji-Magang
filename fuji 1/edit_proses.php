<?php
if (isset($_POST['edit'])) {
  
  include("koneksi.php");

  $id = $_POST['id'];
  $nim = $_POST['nim'];
	$nama	= $_POST['nama'];
	$kelamin	= $_POST['kelamin'];
	$jurusan = $_POST['jurusan'];
	
  $query  = "UPDATE mahasiswa SET ";
  $query .= "nim = '$nim', nama = '$nama', ";
  $query .= "kelamin='$kelamin', ";
  $query .= "jurusan = '$jurusan' ";
  $query .= "where id  = '$id' ";

  $result = mysqli_query($link, $query);

  if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
       " - ".mysqli_error($link));
  }
}

header("location:index.php");

?>