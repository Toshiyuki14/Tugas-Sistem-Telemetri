<?php 

$konek = mysqli_connect("localhost","root","","dbjantung");

$sql = mysqli_query($konek,"SELECT * FROM tbjantung");
$detak = mysqli_fetch_array($sql);

$detakjantung = $detak["detakjantung"];

if($detakjantung == "NoFinger")
echo "Status :-";

else if($detakjantung >= 51 && $detakjantung <= 63)
echo "Status : Sangat Sehat";

else if($detakjantung >= 64 && $detakjantung <= 87)
echo "Status : Sehat";

else if($detakjantung >= 88 && $detakjantung <= 103)
echo "Status : Kurang sehat";

else
echo "Status : Tidak Normal";

?>