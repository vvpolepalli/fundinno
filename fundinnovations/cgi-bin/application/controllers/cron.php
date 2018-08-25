<?php
class cron extends CI_Controller  
{		
	 public function __construct()
       {
            parent::__construct();
			$this->load->model('cronmodel');
	   }
	   
	  function index()
	  {
		  $this->cronmodel->cron_fn();
	  }
	  
	function upload_fn(){
		//$folder_name=date("j_n_Y", strtotime("yesterday"));
		 $dir = UPLOAD_PATH.'uploads/temp_videos/';
		 $uplaod_path= UPLOAD_PATH.'uploads/projects/videos/original/';
		 $temp_path= UPLOAD_PATH.'uploads/temp_videos/';//
		  if(is_dir($dir))
		  {
			$mydir = opendir($dir);
			 while(false !== ($file = readdir($mydir))) {
				if($file != "." && $file != "..") {
					chmod($dir.$file, 0777);
					if(is_dir($dir.$file)) {
					  //  chdir('.');
						//$this->delete_xml_cron($dir.$file.'/');
					   // rmdir($dir.$file) or DIE("couldn't delete $dir$file<br />");
					}
					else{
						$sourceFile=$temp_path.$file;
						$vid_filename = current(explode(".", $file));
		 				$ConvertedFile=$uplaod_path.$vid_filename;
						
						$ffmpegcmd1 = "/usr/bin/ffmpeg -i ".$sourceFile." -ar 22050 -ab 32000 -f flv -sameq -qmax 1 ".$ConvertedFile.".flv";
						$res = exec($ffmpegcmd1, $out, $rv); 
						unlink($dir.$file) or DIE("couldn't delete $dir$file<br />");
					}
				}
				
			}
			closedir($mydir);
			//echo 'all done.';
				//unlink(UPLOAD_PATH.'map_xml/'.$folder_name.'/694071238.xml');
			//rmdir(UPLOAD_PATH."map_xml/".$folder_name);
		  }
	}
}
?>