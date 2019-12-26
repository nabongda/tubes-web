<?php
  include_once "../koneksi.php";

  $result=mysqli_query($mysqli, "SELECT unit.id_unit, unit.nama_unit FROM tpu_unit, unit, tpu WHERE tpu_unit.id_tpu='$_POST[tpu]' AND tpu_unit.id_unit=unit.id_unit AND tpu_unit.id_tpu=tpu.id_tpu");

  echo"<option value=''>-Pilih Unit-</option>";
  while($unit=mysqli_fetch_array($result)){
	echo "<option value=$unit[id_unit]>$unit[nama_unit]</option>";

}
?>