<?php
$conn = mysqli_connect("localhost","root","","ngjitu");

if(!$conn){
    die("Nuk u lidh databaza");
}

session_start();
?>