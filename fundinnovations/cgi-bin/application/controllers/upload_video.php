<?php
 ?><?php
//  ############## //Pramod ############
//  ###########  Created on 29-11-2012 ###########

class upload_video extends CI_Controller 
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
	   $baseurl = base_url();
	//echo "<pre>";
	//print_r($_FILES);exit;

		// Check the upload
		if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0)
		 {
				echo "ERROR:invalid upload";
				exit(0);
		 }
	
	 
		 $thumb_img_name=uniqid();	
		 $uplaod_path='uploads/projects/videos/original/';
		 $thumb_img_path='uploads/projects/videos/thumb/';
                 $temp_path = 'uploads/temp_videos/';
                 $extn=end(explode('.',$_FILES["Filedata"]["name"]));
                 $tmpptthu=$temp_path.$thumb_img_name.'.'.$extn;
                  ini_set('max_execution_time',0);
		 move_uploaded_file($_FILES["Filedata"]["tmp_name"],$tmpptthu);
                // move_uploaded_file($_FILES["Filedata"]["tmp_name"],$temp_path.$thumb_img_name.$_FILES["Filedata"]["name"]);
//                 $uplaod_path= UPLOAD_PATH.'uploads/projects/videos/original/';
//		 $thumb_img_path= UPLOAD_PATH.'uploads/projects/videos/thumb/';
//		 $temp_path = UPLOAD_PATH.'uploads/temp_videos/';
//		 move_uploaded_file($_FILES["Filedata"]["tmp_name"],$temp_path.$thumb_img_name.$_FILES["Filedata"]["name"]);
                 
		 $sourceFile=$temp_path.$thumb_img_name.'.'.$extn;
		 $ConvertedFile=$uplaod_path.$thumb_img_name;
		 $Convertedimg_File=$uplaod_path.$thumb_img_name.'.jpg';
                // $Convertedimg_FileTemp=$temp_path.$thumb_img_name.'.jpg';
		
                
		$ffmpegcmd2 = "/usr/bin/ffmpeg -i ".$sourceFile." -r 1 -ss 00:00:2 -vframes 1 -sameq -f image2 ".$Convertedimg_File;
             
		exec($ffmpegcmd2);
		
	
	
		// Build the thumbnail	of uploaded video image
		$img = @imagecreatefromjpeg($Convertedimg_File); 	
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
		// imagejpeg($new_img,$thumb_img_path.$thumb_img_name.'.jpg');	 
                @imagejpeg($new_img,$thumb_img_path.$thumb_img_name.'.jpg');	
		$file_id = md5($_FILES["Filedata"]["tmp_name"] + rand()*100000);
		
	  
	  	 // $vid_filename = current(explode(".", $thumb_img_name.$_FILES["Filedata"]["name"]));
		 // $thumb_img_name.'.'.$extn
		  //$file_id = md5($_FILES["Filedata"]["tmp_name"] + rand()*100000);
		  
		  
		 echo $thumb_img_name.'.jpg|'.$thumb_img_name.'.flv';
		
		//echo "FILEID:" . $file_id.'|'.$thumb_img_name.'|'.$baseurl.$thumb_img_path;
   }
	//}
	
 }
 ?>