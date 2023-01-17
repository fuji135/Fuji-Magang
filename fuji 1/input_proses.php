<?php
include 'koneksi.php';

if (isset($_POST['input'])) {

  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $kelamin = $_POST['kelamin'];
  $jurusan = $_POST['jurusan'];
  
  $query = "INSERT INTO mahasiswa VALUES (NULL, '$nim', '$nama','$kelamin','$jurusan')";
  $result = mysqli_query($link, $query);
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
}

header("location:index.php");
?>