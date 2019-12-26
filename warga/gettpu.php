<?php

include_once "../koneksi.php";
   
   $kec=$_POST["kec"];
   $result=mysqli_query($mysqli, "SELECT id_tpu,nama_tpu FROM tpu where id_kec='$kec'");
   echo "<option value=''>-Pilih TPU-</option>";
   while($tpu=mysqli_fetch_array($result)){
   	echo"<option value=$tpu[id_tpu]>$tpu[nama_tpu]</option>";
   }

?>