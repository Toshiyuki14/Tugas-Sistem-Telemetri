<?php
$konek = mysqli_connect("localhost","root","","dbjantung");
$data = $_GET['data'];
$simpan = mysqli_query($konek,"UPDATE tbjantung SET detakjantung='$data' ");
if($simpan)
  echo "Berhasil disimpan";
else
  echo "Gagal disimpan";
?>