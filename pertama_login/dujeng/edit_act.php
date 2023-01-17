<?php 

include 'koneksi.php';

if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
       
        $id = $_POST['id'];
        $nama_lengkap = $_POST['nama_lengkap_Mahasiswa'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $foto_nama = $_FILES['pas_foto_terkeren']['name'];
        $foto_size = $_FILES['pas_foto']['size'];

    }else{
        header("location:index.php");
    }
    if ($foto_size > 2097152) {
       header("location:index.php?pesan=size");

    }else{

	   
       if ($foto_nama != "") {		  
          $ekstensi_izin = array('png','jpg','jepg');
          $pisahkan_ekstensi = explode('.', $foto_nama); 
          $ekstensi = strtolower(end($pisahkan_ekstensi));
          $file_tmp = $_FILES['pas_foto']['tmp_name'];   
          $tanggal = md5(date('Y-m-d h:i:s'));
          $foto_nama_new = $tanggal.'-'.$foto_nama; 

		  
          if(in_array($ekstensi, $ekstensi_izin) === true)  {

            $get_foto = "SELECT Mahasiswa_foto FROM Mahasiswa WHERE id_Mahasiswa='$id'";
            $data_foto = mysqli_query($koneksi, $get_foto); 
            $foto_lama = mysqli_fetch_array($data_foto);
            unlink("foto/".$foto_lama['Mahasiswa_foto']);    
            move_uploaded_file($file_tmp, 'foto/'.$foto_nama_new);
            $query = mysqli_query($koneksi, "UPDATE Mahasiswa SET Mahasiswa_nama='$nama_lengkap', Mahasiswa_kelas='$kelas', Mahasiswa_alamat='$alamat', Mahasiswa_foto='$foto_nama_new' WHERE id_Mahasiswa='$id'");
            if($query){
            	header("location:index.php?pesan=berhasil");
            } else {
                header("location:index.php?pesan=gagal");
            }
        } else { 
        	header("location:index.php?pesan=ekstensi");        }

        }else{

          $query = mysqli_query($koneksi, "UPDATE Mahasiswa SET Mahasiswa_nama='$nama_lengkap', Mahasiswa_kelas='$kelas', Mahasiswa_alamat='$alamat' WHERE id_Mahasiswa='$id'");

            if($query){
                header("location:index.php?pesan=berhasil");
            }else {
                header("location:index.php?pesan=gagal");
            }
        }

    }
}else{
   
    header("location:index.php");
}
?>