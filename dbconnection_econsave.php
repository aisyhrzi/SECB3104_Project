<?php

     $con = mysqli_connect("localhost", "root", "", "foodbank");
     if($con == false) {
        die("Connection Error". mysqli_connect_error());
     }

?>