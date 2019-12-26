<?php

$uploadbt=$_POST['uploadbt'];

include_once("../koneksi.php");
$harga = '';
$result=mysqli_query($mysqli, "SELECT * FROM transaksi");
while($data=mysqli_fetch_array($result)){
	$harga = $data['harga'];
               
}

header('location:transaksi.php?petak='.$petak.'&harga='.$harga);

?>