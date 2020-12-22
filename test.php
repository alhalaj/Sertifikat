<!-- <form method="post"  action="prosestest.php">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Username</label>
                            <input type="text" class="form-control" name="username" required autofocus>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary pull-right">Kirim <i class="fa fa-arrow-right"></i></button>
                <a href="login.php" class="btn btn-danger pull-left"><i class="fa fa-arrow-left"></i> Batal</a>

                
                <div class="clearfix"></div>
            </form>	

<?php
// require 'Page/Include/Connect/Connections.php';
//  $query = "SELECT * FROM test";
//  $data  = $con->query($query);
//  While ($row = mysqli_fetch_object($data))
// {
//     echo $row->nama;
// }
?> -->
<?php
	$nama = "Aris";
	// echo $nama;
	if (empty($nama)) {
		$gambar = "Page/Include/Image/1.jpg";
	// 	echo $nama;
	}
		else {
		$gambar = "Page/Include/Image/sertifikat.jpg";
	}
	$image = imagecreatefromjpeg($gambar);
	$white = imageColorAllocate($image, 255, 255, 255);
	$black = imageColorAllocate($image, 0, 0, 0);
	$font = "./Page/Include/Fonts/QuinchoScript_PersonalUse.ttf";
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
	//tampilkan di browser
	header("Content-type:  image/jpeg");
	imagejpeg($image);
	imagedestroy($image);
?>