<?php 

$konek = mysqli_connect("localhost","root","","dbjantung");

$sql = mysqli_query($konek,"SELECT * FROM tbjantung");
$detak = mysqli_fetch_array($sql);

$detakjantung = $detak["detakjantung"];

echo $detakjantung;

?>