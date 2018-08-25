<?php

ob_start();

session_start();



// Define a destination

$targetFolder = '/uploads/media_images'; // Relative to the root

//echo '<pre>';print_r($_FILES);echo '</pre>';

if (!empty($_FILES)) {

	$tempFile = $_FILES['Filedata']['tmp_name'];

	$targetPath = $_SERVER['DOCUMENT_ROOT'].$targetFolder;

	

	

	

	// Validate the file type

	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions 

	$fileParts = pathinfo($_FILES['Filedata']['name']);

	//$vid_exts=array('mp3', 'mp4', 'avi', 'flv', 'wmv');

	

	//if (in_array($fileParts['extension'],$fileTypes)) {

		$filename = uniqid(rand(1,999),false).just_clean($_FILES['Filedata']['name']);

		$targetFile = rtrim($targetPath,'/').'/'.$filename;

		move_uploaded_file($tempFile,$targetFile);

		echo $filename;

		/*if(move_uploaded_file($tempFile,$targetFile)){

			$imgpath  = uniqid(rand(1,999),false).just_clean($_FILES['Filedata']['name']);

	

			$thumb_path=rtrim($targetPath,'/').'/'.$imgpath;

		    $imagedata = @getimagesize($targetFile);

			

			$w = $imagedata[0];

			

			$h = $imagedata[1];

		//	if($h >=150 && $w>=200){

			resizeImageWdthHegt($targetFile,200,150,$thumb_path);

			//@unlink($targetFile);

			echo $imgpath;

			//}else

				//echo $filename;

		} */

	

	//}else{

		//echo 'Invalid file type.';

		//}

}

function resizeImageWdthHegt($inputFilename,$req_wdth,$req_hegt,$thumb_path)

{

			$imagedata = @getimagesize($inputFilename);

			

			if($imagedata[0]>=$req_wdth)

			{

				$new_w=$req_wdth;

				$new_x=0;

			}

			else

			{	

				$new_w=$imagedata[0];

				$new_x=($req_wdth/2)-($new_w/2);

				$end_x=$new_x+$new_w;

			}

			if($imagedata[1]>=$req_hegt)

			{

				$new_h=$req_hegt;

				$new_y=0;

			}

			else

			{

				$new_h=$imagedata[1];

				$new_y=($req_hegt/2)-($new_h/2);

				$end_y=$new_y+$new_h;

			}

			$im1   = imagecreatetruecolor($req_wdth,$req_hegt);

			$white = imagecolorallocate($im1, 255, 255, 255 );

			imagefill( $im1, 0, 0, $white);

			switch ( $imagedata[2] ) {

							case 0:

								break;

							case 1:

								$image = imagecreatefromgif($inputFilename);

								imagecopyresampled ($im1, $image, $new_x, $new_y, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]) or die("Error");

								imagegif($im1,$thumb_path)or die("Error");

								break;

					

							case 2:

								$image = imagecreatefromjpeg($inputFilename);

								imagecopyresampled ($im1, $image, $new_x, $new_y, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]) or die("Error");

								imagejpeg($im1,$thumb_path)or die("Error");

								break;

							

							case 3:

								$image = imagecreatefrompng($inputFilename);

								imagecopyresampled ($im1, $image,$new_x, $new_y, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]) or die("Error");

								imagepng($im1,$thumb_path)or die("Error");

								break;

								

						 /*	case 6:

								$this->imagecreatefrombmp($thumb_path);

								break;*/

													

								

				}

				imagedestroy($im1);

				

			

		}

function just_clean($string)

{

		// Replace other special chars

		$specialCharacters = array(

		'#' => '',

		'$' => '',

		'%' => '',

		'&' => '',

		'@' => '',

		'€' => '',

		'+' => '',

		'=' => '',

		'$' => '',

		'\'' => '',

		'\"' => '',

		'(' => '',

		')' => '',

		'-' => '',

		' ' => ''

		 );

		 

		while (list($character, $replacement) = each($specialCharacters)) {

		$character;

		 $replacement;

		$string = str_replace($character, '-' . $replacement . '-', $string);

		}

		 

		

		 

		// Remove all remaining other unknown characters

		$string = preg_replace('/[^a-zA-Z0-9-.]/', '', $string);

		$string = preg_replace('/^[-]+/', '', $string);

		$string = preg_replace('/[-]+$/', '', $string);

		$string = preg_replace('/[-]{2,}/', '', $string);

		 

		return $string;

		} 

?>