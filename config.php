<?php

$host="sql5.freemysqlhosting.net";
$dbusr="sql5423031";
$dbpwd="WPsukexf3W";
$dbname="sql5423031";

$conn=mysqli_connect($host,$dbusr,$dbpwd,$dbname);

if($conn == false){
    die("Error : could not connect");
}

?>
