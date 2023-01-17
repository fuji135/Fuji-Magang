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
    <h1>Input Data</h1>
    <div class="container">
      <form id="form_mahasiswa" action="input_proses.php" method="post">
        <fieldset>
        <legend>Input Data Mahasiswa</legend>
          <p>
            <label for="nim">NIM : </label>
            <input type="text" name="nim" id="nim" placeholder="Contoh: 12345678">
          </p>
          <p>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama">
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
              <option value=""> </option>
                <option value="TI">TI </option>
                <option value="SI">SI</option>
                <option value="MIKA">MIKA</option>
              </select>
          </p>
        </fieldset>
        <p>
          <input type="submit" name="input" value="SIMPAN">
        </p>
      </form>
    </div>
  </body>
</html>