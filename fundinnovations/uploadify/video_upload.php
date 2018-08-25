<?php	



	/*echo "<pre>";

	print_r($_FILES);exit;*/

	/*if (isset($_POST["PHPSESSID"])) 

	{

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



 

 $thumb_img_name=uniqid();	

 $uplaod_path= $_SERVER['DOCUMENT_ROOT'].'/uploads/projects/videos/original/';

 $thumb_img_path= $_SERVER['DOCUMENT_ROOT'].'/uploads/projects/videos/thumb/';

 move_uploaded_file($_FILES["Filedata"]["tmp_name"],$uplaod_path.$thumb_img_name);

 $sourceFile=$uplaod_path.$thumb_img_name;

 $ConvertedFile=$uplaod_path.$thumb_img_name;

 $Convertedimg_File=$uplaod_path.$thumb_img_name.'.jpg';



	$ffmpegcmd1 = "/usr/bin/ffmpeg -i ".$sourceFile." -ar 22050 -ab 32 -f flv -sameq -qmax 1 ".$ConvertedFile.".flv";			

	$ffmpegcmd2 = "/usr/bin/ffmpeg -i ".$sourceFile." -r 1 -ss 00:00:2 -vframes 1 -sameq -f image2 ".$Convertedimg_File;

    exec($ffmpegcmd1); 

    exec($ffmpegcmd2);

   

	// Build the thumbnail	of uploaded video image

	$img = imagecreatefromjpeg($Convertedimg_File); 	

	if (!$img) 

	{

		echo "ERROR:could not create image handle ";

		exit(0);

	}



	$width = imageSX($img);

	$height = imageSY($img);



	if (!$width || !$height) 

	{

		echo "ERROR:Invalid width or height";

		exit(0);

	} 

	

		

	/*#####################################################*/

	

	$target_width = 85;

	$target_height = 49;

	

	

	//Old Vs new value ratio

	$ratio1=$width/$target_width;

	$ratio2=$height/$target_height;

	

	//if image height and width >627

	if($ratio1>1 and $ratio2>1):

		if($ratio1<$ratio2)    {

		$new_width=$target_width;

		$new_height=$height/$ratio1;

		}

		else    {

		$new_height=$target_height;

		$new_width=$width/$ratio2;                   

		}

	else://else

		$new_height=$width;

		$new_width=$height;

	endif;

	

	

	/*#####################################################*/

	

	

	

			



	$new_img = ImageCreateTrueColor($new_width, $new_height);

	$white = imagecolorallocate($new_img, 255, 255, 255 );

	imagefill($new_img, 0, 0, $white);	



	if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height))

	 {

		echo "ERROR:Could not resize image";

		exit(0);

	 }

 



	//sumesh	

		  imagejpeg($new_img,$thumb_img_path.$thumb_img_name.'.jpg');	 

   //sumesh

	



	// Use a output buffering to load the image into a variable

	ob_start();	

	 

	 

	$imagevariable = ob_get_contents();

	ob_end_clean();



	$file_id = md5($_FILES["Filedata"]["tmp_name"] + rand()*100000);

	

	$_SESSION["file_info"][$file_id] = $imagevariable;



	//echo "FILEID:" . $file_id.'|'.$thumb_img_path.$thumb_img_name; 	// Return the file id and filname to the script

//	echo "FILEID:" . $file_id.'|'.$thumb_img_name;

	echo $thumb_img_name.'.jpg|'.$thumb_img_name.'.flv';

	?>