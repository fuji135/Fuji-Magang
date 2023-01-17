<?php
  
  include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      table{
        width: 840px;
        margin: auto;
      }
      body {
        background-image: url("img/um1.png"); 
        background-repeat: no-repeat;
        background-size: 100%;
        background-position:center;
        color: black;
       
       
        font-size: 20px;
        padding: 110px;
        
      }
      h1{
        text-align: center;
      }
    </style>
  </head>
  <body>
   <div>
   <h1> <img src="https://fontmeme.com/permalink/230110/f7654ec7ee6b05878a889395420e32bc.png" alt=""> </h1>

   </div>
    
    <br/>
    <table border="2" style="background-color:red;">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelamin</th>
        <th>Jurusan</th>
        <th>Pilihan</th>
      </tr>
      <?php
      $query = "SELECT * FROM mahasiswa ORDER BY nim ASC";
      $result = mysqli_query($link, $query);
      
      if(!$result){
        die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
      }
      $no = 1; 
      while($data = mysqli_fetch_assoc($result))
      {
        
        echo "<tr>";
        echo "<td>$no</td>"; 
        echo "<td>$data[nim]</td>";
        echo "<td>$data[nama]</td>"; 
        echo "<td>$data[kelamin]</td>"; 
        echo "<td>$data[jurusan]</td>"; 
    
        
        echo '<td >
          <a href="edit.php?id='.$data['id'].'"><button style="background-color:#91c87c;"> Edit</button></a>
          <a href="hapus.php?id='.$data['id'].'"
      		  onclick="return confirm(\'Anda yakin akan menghapus data?\')"><button style="background-color:#ffa07a"> Hapus</button></a> 
        </td>';
        echo "</tr>";
        $no++; 
      }
      ?>
    </table><br>
    <center><a href="input.php"><img src="https://fontmeme.com/permalink/230110/f4287f32c1ceb4b30a0b421fbc957be3.png"></a></center><br>
  </body>
</html>