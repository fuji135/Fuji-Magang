<?php
  include 'koneksi.php';
  if (isset($_GET['id'])) {
   
    $id = ($_GET["id"]);

    $query = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = mysqli_query($link, $query);
   
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    $data = mysqli_fetch_assoc($result);
    $nim = $data["nim"];
    $nama = $data["nama"];
    $kelamin = $data["kelamin"];
    $jurusan = $data["jurusan"];

  } else {

    header("location:index.php");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      h1{
        text-align: center;
      }
      .container{
        width: 400px;
        margin: auto;
      }
    </style>
  </head>
  <body>
    <h1>Edit Data</h1>
    <div class="container">
      <form id="form_mahasiswa" action="edit_proses.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <fieldset>
        <legend>Edit Data Mahasiswa</legend>
          <p>
            <label for="nim">NIM : </label>
            <input type="text" name="nim" id="nim" value="<?php echo $nim ?>">
          </p>
          <p>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" value="<?php echo $nama ?>">
          </p>
          
          <p>
            <label for="kelamin">Kelamin : </label>
            <select name="kelamin" id="kelamin">
            <option value=""></option>
            <option value="LAKI-LAKI">LAKI-LAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>
                </select>
          </p>
          <p>
            <label for="jurusan" >Jurusan : </label>
              <select name="jurusan" id="jurusan">
              <option value=""></option>
                <option value="TI" <?php if($data['jurusan'] == 'TI'){ echo 'selected'; } ?>>
                TI </option>
                <option value="SI" <?php if($data['jurusan'] == 'SI'){ echo 'selected'; } ?>>
                SI</option>
                <option value="MIKA" <?php if($data['jurusan'] == 'MIKA'){ echo 'selected'; } ?>>
                MIKA</option>
    
              </select>
          </p>
          
        </fieldset>
        <p>
          <input type="submit" name="edit" value="Update Data">
        </p>
      </form>
  </div>
  </body>
</html>