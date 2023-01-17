<?php

    $mysqli = new mysqli("localhost","root","","master_bidang");
    if (!$mysqli){
        die("conection failed:" .mysqli_conect_error());
    }

?>