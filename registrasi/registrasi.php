<?php

include_once "../koneksi.php";
 
$nama=$_POST['nama'];
$username=$_POST['username'];
$ttl=$_POST['ttl'];
$jk=$_POST['jk'];
$password=$_POST['password'];
$kpassword=$_POST['kpassword'];

$cek_user=mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username'"));

if ($cek_user > 0) {
    echo '<script language="javascript">
    alert ("Username Sudah Ada Yang Menggunakan");
    window.location="index.php";
    </script>';
    exit();
}

else {
    if($password == $kpassword){
        $level="warga";
        $result=mysqli_query($mysqli, "INSERT INTO user(nama_user, username, tanggal_lahir, jenis_kelamin, kata_sandi, level) VALUES ('$nama','$username','$ttl','$jk','$password', '$level')");

        echo '<script language="javascript">
        alert ("Registrasi Berhasil Di Lakukan!");
        window.location="index.php";
        </script>';
        exit();
    } 
    else{
        echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";
    }
    
}

?>
