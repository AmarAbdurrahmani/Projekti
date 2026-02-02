<?php
include "db.php";

$emri     = $_POST['emri'];
$mbiemri  = $_POST['mbiemri'];
$email    = $_POST['email'];
$telefoni = $_POST['telefoni'];
$adresa   = $_POST['adresa'];
$data     = $_POST['data'];
$persona  = $_POST['persona'];
$shenime  = $_POST['shenime'];

$sql = "INSERT INTO reservations
(emri, mbiemri, email, telefoni, adresa, data, persona, shenime)
VALUES
('$emri','$mbiemri','$email','$telefoni','$adresa','$data','$persona','$shenime')";

mysqli_query($conn, $sql);

?>
