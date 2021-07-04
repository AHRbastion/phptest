<?php

$host="localhost";
$dbusr="root";
$dbpwd="";
$dbname="tiktak";

$conn=mysqli_connect($host,$dbusr,$dbpwd,$dbname);

if($conn == false){
    die("Error : could not connect");
}

?>