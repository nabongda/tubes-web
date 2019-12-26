<?php
	session_start();

	function randomCaptcha(){
		$abjad = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

		$pass = array();
		$pabjad = strlen($abjad) - 2;
		for ($i=0; $i < 5; $i++) { 
			$n = rand(0, $pabjad);
			$pass[] = $abjad[$n];
		}

		return implode($pass);
	}

	$code = randomCaptcha();
	$_SESSION["code"] = $code;

	$wh = imagecreatetruecolor(173, 50);
	$bgc = imagecolorallocate($wh, 22, 86, 165);
	$fc = imagecolorallocate($wh, 223, 230, 233);

	imagefill($wh, 0, 0, $bgc);

	imagestring($wh, 10, 50, 15, $code, $fc);

	header('content-type: image/jpg');
	imagejpeg($wh);
	imagedestroy($wh);
?>