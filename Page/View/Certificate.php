<?php
echo 	$nama = $_POST['namacetak'];
	// echo $nama;
	if (empty($nama)) {
		$gambar = "../Include/Image/1.jpg";
	// 	echo $nama;
	}
		else {
		$gambar = "../Include/Image/sertifikat.jpg";
	}
	$image = imagecreatefromjpeg('sertifikat.jpg');
	$white = imageColorAllocate($image, 255, 255, 255);
	$black = imageColorAllocate($image, 0, 0, 0);
	//$font = __DIR__ . '/AQuinchoScript_PersonalUse.ttf';
	$font=__DIR__ . '/BRUSHSCI.TTF';
	$size = 42;
	//definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
	$image_width = imagesx($image);  
	//membuat textbox agar text centered
	$text_box = imagettfbbox($size,0,$font,$nama);
	$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
	$text_height = $text_box[3]-$text_box[1];
	$x = ($image_width/2) - ($text_width/2);
	//generate sertifikat beserta namanya
	imagettftext($image, $size, 0, $x, 400, $black, $font, $nama);
	$file=$nama;
		imagejpeg($image,"serti/".$file.".jpg");
		imagedestroy($image);
	echo "<script>alert('Sertifikat Berhasil dcetak'); window.location.href='serti/".$file.".jpg.'</script>";	
	//tampilkan di browser
//	header("Content-type:  image/jpeg");
//	imagejpeg($image);
//	imagedestroy($image);

?>
