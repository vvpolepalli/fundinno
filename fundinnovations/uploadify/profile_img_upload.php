<?php

	/* Note: This thumbnail creation script requires the GD PHP Extension.  

		If GD is not installed correctly PHP does not render this page correctly

		and SWFUpload will get "stuck" never calling uploadSuccess or uploadError

	 */



	// Get the session Id passed from SWFUpload. We have to do this to work-around the Flash Player Cookie Bug

/*$burl = $_GET['burl'];

	

	if (isset($_POST["PHPSESSID"])) {

		session_id($_POST["PHPSESSID"]);

	}



	session_start();

	ini_set("html_errors", "0");*/



// Check the upload

if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0)

 {

		echo "ERROR:invalid upload";

		exit(0);

 }



	// Get the image and create a thumbnail

	//sumesh

	 $rs=getimagesize($_FILES["Filedata"]["tmp_name"]);

	 if($rs[2]==1)

	 {

		$img = imagecreatefromgif($_FILES["Filedata"]["tmp_name"]); 

	 }

	  if($rs[2]==2)

	 {

		$img = imagecreatefromjpeg($_FILES["Filedata"]["tmp_name"]); 

	 }

	  if($rs[2]==3)

	 {

		$img = imagecreatefrompng($_FILES["Filedata"]["tmp_name"]); 

	 }

	//sumesh

	

	if (!$img) {

		echo "ERROR:could not create image handle ". $_FILES["Filedata"]["tmp_name"];

		exit(0);

	}



	$width = imageSX($img);

	$height = imageSY($img);

	

	$target_width = 98;

	$target_height = 98;

	$target_width1 = 70;

	$target_height1 = 65;



	if (!$width || !$height || $width <$target_width || $height<$target_height) {

		echo "Please upload images of size, Minimum $target_width X $target_height";

		exit(0);

	} 

	// Build the thumbnail

	list($new_width,$new_height) = resizeThumbImage($width,$height,$target_width,$target_height);		



	$new_img = ImageCreateTrueColor($new_width, $new_height);

	//$white = imagecolorallocate($new_img, 255, 255, 255 );

	//imagefill($new_img, 0, 0, $white);	



	//if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height))

	if (!@imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height))

	 {

		echo "ERROR:Could not resize image";

		exit(0);

	 }

	 // Build the thumbnail

	 list($new_width1,$new_height1) = resizeThumbImage($width,$height,$target_width1,$target_height1);		



	$new_img1 = ImageCreateTrueColor($new_width1, $new_height1);

	//$white = imagecolorallocate($new_img, 255, 255, 255 );

	//imagefill($new_img, 0, 0, $white);	



	//if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height))

	if (!@imagecopyresampled($new_img1, $img, 0, 0, 0, 0, $new_width1, $new_height1, $width, $height))

	 {

		echo "ERROR:Could not resize image";

		exit(0);

	 }

 



	if (!isset($_SESSION["file_info"])) 

	{

		$_SESSION["file_info"] = array();

	}

	

	$uplaod_path=$_SERVER['DOCUMENT_ROOT'].'/uploads/site_users/original/';

	$thumb_img_path=$_SERVER['DOCUMENT_ROOT'].'/uploads/site_users/thumb/';

	$small_img_path=$_SERVER['DOCUMENT_ROOT'].'/uploads/site_users/small/';

	

	

	//sumesh

	 $thumb_img_name=uniqid().''.$_FILES["Filedata"]["name"];	

	 if($rs[2]==1)

	 {

		move_uploaded_file($_FILES["Filedata"]["tmp_name"],$uplaod_path.$thumb_img_name);

		imagegif($new_img,$thumb_img_path.$thumb_img_name);	

		imagegif($new_img1,$small_img_path.$thumb_img_name);			

	 }

	 

	 if($rs[2]==2)

	 {

		  move_uploaded_file($_FILES["Filedata"]["tmp_name"],$uplaod_path.$thumb_img_name);

		  imagejpeg($new_img,$thumb_img_path.$thumb_img_name);

		  imagejpeg($new_img1,$small_img_path.$thumb_img_name);

	 }

	 

	 if($rs[2]==3)

	 {

		 move_uploaded_file($_FILES["Filedata"]["tmp_name"],$uplaod_path.$thumb_img_name);

		 imagepng($new_img,$thumb_img_path.$thumb_img_name);

		 imagepng($new_img1,$small_img_path.$thumb_img_name);

	 }     

	 

	

   //sumesh

	



	// Use a output buffering to load the image into a variable

	ob_start();

	if($rs[2]==1) {

	  imagegif($new_img);

	  imagegif($new_img1);

	}

	if($rs[2]==2) {

	  imagejpeg($new_img);

	  imagejpeg($new_img1);

	}

	if($rs[2]==3) {

	  imagepng($new_img);

	  imagepng($new_img1);

	 }

	$imagevariable = ob_get_contents();

	ob_end_clean();

	echo $thumb_img_name;

	//$file_id = md5($_FILES["Filedata"]["tmp_name"] + rand()*100000);

	//$_SESSION["file_info"][$file_id] = $imagevariable;

	//echo "FILEID:" . $file_id.'|'.$thumb_img_path.$thumb_img_name.'|'.$burl; 	// Return the file id and filname to the script

	

	function resizeThumbImage($ow,$oh,$tw,$th) {

		$target = $tw;

		if ($ow > $oh) {

		   $percentage = ($target / $ow);

		} else {

		   $percentage = ($target / $ow);

		} 

		$pnw = round($ow * $percentage);

		$pnh = round($oh * $percentage); 

		if($pnh < $th) {

			$target = $th;

			if ($ow > $oh) {

			   $percentage = ($target / $oh);

			} else {

			   $percentage = ($target / $oh);

			} 

			$pnw = round($ow * $percentage);

			$pnh = round($oh * $percentage); 

		}	

		return array($pnw,$pnh);

	}

?>