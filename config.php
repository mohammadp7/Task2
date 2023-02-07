<?php

$host="localhost";
$database="mohammad_db";
$user="mohammad_user";
$pass="ueXVzip6K5So";


$conn= mysqli_connect($host,$user,$pass,$database);

if(!$conn){
        die('Could not Connect My Sql:' . mysqli_connect_error());
    }

?>