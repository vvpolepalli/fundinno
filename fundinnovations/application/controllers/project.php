<?php
class Project extends CI_Controller  
{		
	 public function __construct()
       {
            parent::__construct();	
			
			if($this->phpsession->get('user_id')=='')
			{
				$this->phpsession->save('redirectToCurrent', current_url());
				//echo 'ooo';
				redirect('signin','refresh');
			}else{
				$this->mysmarty->assign('profile_name',$this->phpsession->get('profile_name'));
			}
			$this->load->model('projectmodel');
			//echo $this->phpsession->get('redirectToCurrent');
			//$this->load->model('categorymodel');
			$media=$this->projectmodel->media_banner_list();
			$this->mysmarty->assign('media',$media);
			$this->mysmarty->assign('user_id',$this->phpsession->get('user_id'));	
			$this->mysmarty->assign('baseurl',base_url());	
			$this->mysmarty->assign('header','header.tpl');
			$this->mysmarty->assign('footer','footer.tpl');
			error_reporting(E_ALL ^ E_NOTICE); 	
	   }
	function index(){
		//echo 'ooo';
		redirect('project/innovate_project');
	}
	function innovate_project($proj_id=''){
		//echo 'ooo';
		$category=$this->projectmodel->get_category();
		$durations=$this->projectmodel->get_duration();
		$cities=$this->projectmodel->get_cities();
	    $this->mysmarty->assign('category',$category);	
		$this->mysmarty->assign('durations',$durations);
		$this->mysmarty->assign('cities',$cities);
		$user_idproof=$this->projectmodel->get_user_idproof();
		$id_sts=$user_idproof['address_proof_image'];
		$add_sts=$user_idproof['address_id_proof'];
		if($id_sts !='' && $add_sts !=''){
			$proof_sts=1;
		}
		else
		$proof_sts='';
		if($proj_id !='')
		{
			$prot=$this->projectmodel->check_project_owner($proj_id);
			//print_r($prot);
			if($prot !=0){
			$project_det		= $this->projectmodel->get_project_det($proj_id);
			$project_status 	= $this->projectmodel->check_project_status($proj_id);
			if($project_status['status'] == 'approved')
			redirect('project/innovate_project');
			
			$this->mysmarty->assign('project_status',$project_status);	
			}
			else
			redirect('project/innovate_project');
		}
		else
		{
			$project_det=0;
		}
		$this->mysmarty->assign('project_det',$project_det);	
		$this->mysmarty->assign('id_sts',$proof_sts);	
		$this->mysmarty->assign('middlecontent','projects/innovate_project.tpl');				
	    $this->mysmarty->display('layout.tpl');
	}
	function innovate_project_videos($proj_id=''){
		if($proj_id !='')
		{
			$prot=$this->projectmodel->check_project_owner($proj_id);
			//print_r($prot);
			if($prot !=0){
			$proj_videos=$this->projectmodel->get_project_videos($proj_id);
			$project_status 	= $this->projectmodel->check_project_status($proj_id);
			if($project_status['status'] == 'approved')
			redirect('project/innovate_project');
			
			$this->mysmarty->assign('project_status',$project_status);	
			}
			else
			redirect('project/innovate_project');
		}
		else
		{
			$proj_videos=0;
		}
		$this->mysmarty->assign('proj_videos',$proj_videos);	
		//$this->mysmarty->assign('project_det',$project_det);
		$this->mysmarty->assign('proj_id',$proj_id);	
		$this->mysmarty->assign('middlecontent','projects/innovate_projects_videos.tpl');				
	    $this->mysmarty->display('layout.tpl');
	}
	
	function innovate_project_images($proj_id=''){
		if($proj_id !='')
		{
			$prot=$this->projectmodel->check_project_owner($proj_id);
			if($prot !=0){
			$proj_photos = $this->projectmodel->get_project_photos($proj_id);
			$project_main_img=  $this->projectmodel->get_project_by_id($proj_id);
			$project_status 	= $this->projectmodel->check_project_status($proj_id);
			if($project_status['status'] == 'approved')
			redirect('project/innovate_project');
			
			$this->mysmarty->assign('project_status',$project_status);	
			}
			else
			redirect('project/innovate_project');
			//$project_det=$this->projectmodel->get_project_det($proj_id);
		}
		else
		{
			$proj_photos=0;
		}
		$this->mysmarty->assign('proj_id',$proj_id);
		$this->mysmarty->assign('proj_photos',$proj_photos);
		$this->mysmarty->assign('project_main_img',$project_main_img);
		
		
		//$this->mysmarty->assign('project_det',$project_det);	
		$this->mysmarty->assign('middlecontent','projects/innovate_projects_images.tpl');				
	    $this->mysmarty->display('layout.tpl');
	}
	
	function innovate_project_comments($proj_id=''){
		if($proj_id !='')
		{
			$prot=$this->projectmodel->check_project_owner($proj_id);
			if($prot !=0)
			{
				$proj_comments 	= $this->projectmodel->get_project_comments($proj_id);
				$project_status 	= $this->projectmodel->check_project_status($proj_id);
				if($project_status['status'] == 'approved')
				redirect('project/innovate_project');
				$this->mysmarty->assign('project_status',$project_status);	
				//$proj_photos = $this->projectmodel->get_project_photos($proj_id);
			}
			else
			redirect('project/innovate_project');
		}
		else
		{
			$proj_comments=0;
		}
		$this->mysmarty->assign('proj_id',$proj_id);
		$this->mysmarty->assign('proj_comments',$proj_comments);
		$this->mysmarty->assign('middlecontent','projects/innovate_projects_comments.tpl');				
	    $this->mysmarty->display('layout.tpl');
	}
	function update_project_comment(){
		if($_POST['comment_id'] !='') 
		echo $proj_comments=$this->projectmodel->update_project_comment($_POST);
	}

	function delete_project_comment(){
		if($_POST['comment_id'] !='') 
		echo $proj_comments=$this->projectmodel->delete_project_comment($_POST);
	}
	function innovate_project_updates($proj_id=''){
		if($proj_id !='')
		{
			$prot=$this->projectmodel->check_project_owner($proj_id);
			if($prot !=0){
				$project_status 	= $this->projectmodel->check_project_status($proj_id);
				if($project_status['status'] == 'approved')
				redirect('project/innovate_project');
				
				if($project_status['project_status'] !='success'){
			 		redirect('innovate_project/'.$proj_id);
				}
				$this->mysmarty->assign('project_status',$project_status);
				
				$check_update_privlage = $prot['0']['project_update_privilage'];
				if($check_update_privlage == 1)
				$proj_updates = $this->projectmodel->get_project_updates($proj_id);
				else
				redirect('project/innovate_project/'.$proj_id);
			}
			else
			   redirect('project/innovate_project');
			
		}
		else
		{
			$project_det=0;
		}
		$this->mysmarty->assign('proj_id',$proj_id);
		$this->mysmarty->assign('proj_updates',$proj_updates);	
		$this->mysmarty->assign('middlecontent','projects/innovate_projects_updates.tpl');				
	    $this->mysmarty->display('layout.tpl');
	}
	function post_project($proj_id =''){
		//echo '<pre>'; print_r($_POST);echo '</pre>';
		 if( isset($_POST)){
		 if($proj_id =='')		 
		 echo $projectId=$this->projectmodel->post_project($_POST);
		 else
		 echo $projectId=$this->projectmodel->update_project($_POST,$proj_id);
		// redirect('project/innovate_project/'.$projectId);
		 
		}
	 }
	 function city_auto_suggest(){
		  $locations = $this->projectmodel->auto_suggest();
          echo $locations;
	 }
	 function update_projects_update(){
		// echo '<pre>'; print_r($_POST);echo '</pre>';
		  echo $projectId=$this->projectmodel->update_projects_update($_POST);
		}
	 function remove_project_reward(){
		if( isset($_POST)){
			$re	= $this->projectmodel->remove_project_reward($_POST);
			echo $re;
		}
	}
	function insert_project_photos() {
		$ins_ad = $this->projectmodel->insert_project_images();
		echo $ins_ad;
	}
	
	function remove_proj_photos(){
		$de= $this->projectmodel->remove_proj_photo();
		echo $de;
	}
	
	function view_termsofuse(){
		$re	= $this->projectmodel->get_termsofuse();
		//print_r($re);
		if($this->input->post('proj_id')== '')
		$proj_id ='';
		else
		$proj_id=$this->input->post('proj_id');
		
		$this->mysmarty->assign('re',$re);
		$this->mysmarty->assign('proj_id',$proj_id);
		$this->mysmarty->display('projects/terms_pop.tpl');
		//echo $re[''];
	}
	 function unlink_project_video()
	 {
	 	$removeVid	= $this->projectmodel->delete_project_video();
		echo $removeVid;
	 }
	 function update_video_caption(){
		$update	= $this->projectmodel->update_video_caption();
		echo $update;
	}
	 function unlink_project_image()
	 {
	 	$removeImg	= $this->projectmodel->delete_project_image();
		echo $removeImg;
	 }
	function  update_image_caption(){
		$update	= $this->projectmodel->update_image_caption();
		echo $update;
	}
	function create_video()
	{
		$type=$this->input->post('video_type');
		$video_file=$this->input->post('video_file');
		$vidImgfile=$this->input->post('vidImgfile');
		$project_id=$this->input->post('project_id');
		echo $this->projectmodel->insert_video($type,$video_file,$vidImgfile,$project_id);		
	}
	
	 function add_youtube_video($proj_id)
	{
			$videourl=$this->input->post('you_tube_url');
			$url =parse_url($videourl);
			$vid_title=$this->input->post('vid_title');
			parse_str($url['query'],$VideoIDInfo);
			$youtubevideoID=$VideoIDInfo['v'];
			$this->getYoutubeInformation($youtubevideoID);
			#########	Fetch From The Youtube API	##########
			$source="youtube";
			$youtube_url="http://gdata.youtube.com/feeds/api/videos/";
			$youtube_url.=$youtubevideoID."?v=2&alt=jsonc";	
			$json=@json_decode(file_get_contents($youtube_url));
			$errorcode=0;
			if(count($json) > 0):
				
			
				#Thumbnail
				$thumbnailurl=$json->data->thumbnail->sqDefault;
				# Title
				//$title=$json->data->title;
				#description
				//$description=$json->data->description;
				# Duration
				$video_duration=round(($json->data->duration/60)).'&nbsp;min';
				$videoInformation=array('videoid'=>$youtubevideoID,'vid_title'=>$vid_title,'thumbnail'=>$thumbnailurl,'videotype'=>'0','videourl'=>$videourl,'project_id'=>$proj_id,'errorcode'=>$errorcode);
				$this->projectmodel->add_youtube_video($videoInformation);
				echo json_encode($videoInformation);
				
			else:
				$errorcode="403";
				$videoInformation=array('errorcode'=>$errorcode);
				echo json_encode($videoInformation);
				
			endif;
			
	}
	function getYoutubeInformation($videoID) 
	{
	
		$feed = ('http://gdata.youtube.com/feeds/api/videos/'.$videoID.'?alt=rss');
		$this->dom = $this->getFeed($feed);
	
	}
	
	function getFeed($feed) 
	{
		$content = $this->getContent($feed);
		$dom = new DOMDocument('1.0', 'utf-8');
		@$dom->loadXML($content);
		return $dom;
	}
	
	
	function getContent($url) 
	{
		$sesion = curl_init($url);
		//echo $url;
		curl_setopt($sesion, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($sesion, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($sesion, CURLOPT_TIMEOUT, 10);
		curl_setopt($sesion, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7');
		$result = curl_exec($sesion);
		curl_close($sesion);
		return $result;
	}
	
	function add_vimeo_video($proj_id){
		$url =parse_url($this->input->post('vimeo_url'));
		$vid_title=$this->input->post('vid_title');
		$vimeoURLArray=explode('/',$url['path']);
		$vimeovideoID=$vimeoURLArray[1];
		$VideoInfo =$this->getVimeoInfo($vimeovideoID);
		$Info=$this->getVimeoDetails($VideoInfo);
		$source="vimeo";
		#Thumbnail
		$thumbnailurl=$Info['thumb'];
		# Title
		//$title=$Info['title'];
		# Duration
		//$video_duration=$Info['width'].'&nbsp;min';
		if($thumbnailurl !=''){
		$dupchk=$this->projectmodel->insert_vimeo_video($vimeovideoID,$proj_id,$thumbnailurl); 
		$videoInformation=array('videoid'=>$vimeovideoID,'vid_title'=>$vid_title,'thumbnail'=>$thumbnailurl,'videotype'=>'2','videourl'=>$this->input->post('vimeo_url'),'project_id'=>$proj_id,'errorcode'=>0);
		}else
		$videoInformation=array('videoid'=>$vimeovideoID,'thumbnail'=>$thumbnailurl,'videotype'=>'2','videourl'=>$this->input->post('vimeo_url'),'project_id'=>$proj_id,'errorcode'=>1);
		
		
		//$this->projectmodel->add_youtube_video($videoInformation);
		echo json_encode($videoInformation);
		
	}
	
	function getVimeoInfo($id) 
	{
			if (!function_exists('curl_init')) die('CURL is not installed!');
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://vimeo.com/api/v2/video/$id.php");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$output = unserialize(curl_exec($ch));
			$output = $output[0];
			curl_close($ch);
			return $output;
	}
	
	//Method to get the vimeo details
	function getVimeoDetails($VideoInfo)
	{
		  $thumb=$VideoInfo['thumbnail_medium'];
		  $title=$VideoInfo['title'];
		  $tags =$VideoInfo ['tags'];
		  $longdesc=$VideoInfo ['description'];
		  $width=round($VideoInfo['width']);
		  $vimeovideoID=$VideoInfo['id'];
		  $VimeoInfoArray=array("id"=>$vimeovideoID,"thumb"=>$thumb,"title"=>$title,"tags"=>$tags,"description"=>$longdesc,"width"=>$width);
		  return  $VimeoInfoArray;
	}
	
	
	function remove_proj_video(){
		$de= $this->projectmodel->remove_proj_video();
		echo $de;
	}
	function get_project_video_name(){
		if($this->phpsession->get('vid_file') !='')
		echo $this->phpsession->get('vid_file').'.jpg|'.$this->phpsession->get('vid_file').'.flv';
		else
		echo 0;
	}
}
?>