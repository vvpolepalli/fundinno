<?php
//  ############## //Pramod ############
//  ###########  Created on 29-11-2012 ###########

class Profile_img_upload extends CI_Controller 
 {
  function __construct()
   {
	    parent::__construct();			
		$this->load->helper('url');		
		$baseurl =	$this->config->base_url();
		$this->mysmarty->assign('baseurl',$baseurl);			
		error_reporting(E_ALL ^ E_NOTICE);
   }
   
   function index() {
	   if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0)
		 {
				echo "ERROR:invalid upload";
				exit(0);
		 }
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
		echo "Please upload images of size, Minimum 98 X 98";
		exit(0);
	} 
	// Build the thumbnail
	list($new_width,$new_height) = $this->resizeThumbImage($width,$height,$target_width,$target_height);		

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
	 list($new_width1,$new_height1) = $this->resizeThumbImage($width,$height,$target_width1,$target_height1);		

	$new_img1 = ImageCreateTrueColor($new_width1, $new_height1);
	
	if (!@imagecopyresampled($new_img1, $img, 0, 0, 0, 0, $new_width1, $new_height1, $width, $height))
	 {
		echo "ERROR:Could not resize image";
		exit(0);
	 }
 

	
	$uplaod_path	= UPLOAD_PATH.'uploads/site_users/original/';
	$thumb_img_path = UPLOAD_PATH.'uploads/site_users/thumb/';
	$small_img_path = UPLOAD_PATH.'uploads/site_users/small/';
	
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
	
	

	

	// Use a output buffering to load the image into a variable

	/*if($rs[2]==1) {
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
	 }*/
	 // echo $thumb_img_name;exit; 
	
	echo $thumb_img_name;
 }
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

 ?>