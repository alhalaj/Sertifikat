<?php
 	$nama = $_POST['namacetak'];
	$status = $_POST['status'];
	$seminar = $_POST['seminar'];
	// echo $nama;
	if (empty($nama)) {
		$gambar = "../Include/Image/1.jpg";
	// 	echo $nama;
	}
		else {
		$gambar = "../Include/Image/sertifikat.jpg";
	}
	if($status === "Pemakalah" && $seminar === "Munasba 2020" )
	{
	$image = imagecreatefrompng('pemakalah.png');
	$white = imageColorAllocate($image, 255, 255, 255);
	$black = imageColorAllocate($image, 51, 51, 51);
	//$font = __DIR__ . '/AQuinchoScript_PersonalUse.ttf';
	$font=__DIR__ . '/Garamond.ttf';
	$size = 85;
	//definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
	$image_width = imagesx($image);  
	//membuat textbox agar text centered
	$text_box = imagettfbbox($size,0,$font,$nama);
	$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
	$text_height = $text_box[3]-$text_box[1];
	$x = ($image_width/2) - ($text_width/2);
	//generate sertifikat beserta namanya
	imagettftext($image, $size, 0, $x, 530, $black, $font, $nama);
	$file=$nama;
		imagejpeg($image,"serti/".$file.".png");
		imagedestroy($image);
	echo "<script>alert('Sertifikat Berhasil dcetak'); 
	window.location.href='serti/".$file.".png';
	</script>";
	//tampilkan di browser
//	header("Content-type:  image/jpeg");
//	imagejpeg($image);
//	imagedestroy($image);
	} elseif ($status === "Non Pemakalah" && $seminar === "Munasba 2020" ) {
	$image = imagecreatefrompng('peserta.png');
	$white = imageColorAllocate($image, 255, 255, 255);
	$black = imageColorAllocate($image, 51, 51, 51);
	//$font = __DIR__ . '/AQuinchoScript_PersonalUse.ttf';
	$font=__DIR__ . '/Garamond.ttf';
	$size = 85;
	//definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
	$image_width = imagesx($image);  
	//membuat textbox agar text centered
	$text_box = imagettfbbox($size,0,$font,$nama);
	$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
	$text_height = $text_box[3]-$text_box[1];
	$x = ($image_width/2) - ($text_width/2);
	//generate sertifikat beserta namanya
	imagettftext($image, $size, 0, $x, 530, $black, $font, $nama);
	$file=$nama;
		imagejpeg($image,"serti/".$file.".png");
		imagedestroy($image);
	echo "<script>alert('Sertifikat Berhasil dcetak'); 
	window.location.href='serti/".$file.".png';
	</script>";
	} elseif ($seminar === "Seminar Ke2" ) {
    $image = imagecreatefrompng('seminar2.png');
	$white = imageColorAllocate($image, 255, 255, 255);
	$black = imageColorAllocate($image, 51, 51, 51);
	//$font = __DIR__ . '/AQuinchoScript_PersonalUse.ttf';
	$font=__DIR__ . '/Garamond.ttf';
	$size = 95;
	//definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
	$image_width = imagesx($image);  
	//membuat textbox agar text centered
	$text_box = imagettfbbox($size,0,$font,$nama);
	$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
	$text_height = $text_box[3]-$text_box[1];
	$x = ($image_width/2) - ($text_width/2);
	//generate sertifikat beserta namanya
	imagettftext($image, $size, 0, $x, 910, $black, $font, $nama);
	$file=$seminar.$nama;
		imagejpeg($image,"serti/".$file.".png");
		imagedestroy($image);
	echo "<script>alert('Sertifikat Berhasil dcetak'); 
	window.location.href='serti/".$file.".png';
	</script>";
		
	}
	

?>
