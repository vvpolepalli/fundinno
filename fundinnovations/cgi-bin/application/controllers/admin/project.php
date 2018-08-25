<?php
class Project extends CI_Controller  
{		
	 public function __construct()
       {
            parent::__construct();
			//$this->load->library('session');	
			if(!($this->phpsession->get('username')))
			{
				redirect('admin/login','refresh');
			}
			$this->load->model('admin/projectmodel');
			$this->load->model('admin/categorymodel');
			$this->mysmarty->assign('adminid',$this->phpsession->get('username'));	
			$this->mysmarty->assign('baseurl',base_url());	
			$this->mysmarty->assign('header','admin/header.tpl');
			$this->mysmarty->assign('leftpane','admin/leftpane.tpl');
			error_reporting(E_ALL ^ E_NOTICE); 	
	   }
	    function index($type='all', $currP='') {	
		 $category 	= $this->categorymodel->select_category();
		  $this->mysmarty->assign('sel_category',$category);
		  
		  //$this->mysmarty->assign('url_type',$type);
		  $this->mysmarty->assign('hidcurrP',1);
		  if($type=='all_1') { 
			$hedline = 'Active';
			$block_type = 0; 
		  }
		  else if($type=='all_2') { 
			$hedline = 'Blocked';
			$block_type = 0; 
		  }
		  else if($type=='all_0') { 
			$hedline = 'Pending'; 
			$block_type = 0; 
		  }
		
		  else { 
			$hedline = ''; 
			$block_type = 0;
		  }
		  $this->mysmarty->assign('page_headline',$hedline);
		 // $this->mysmarty->assign('hide_type',$block_type);
		  $this->mysmarty->assign('middlecontent','admin/projects/manage_projects.tpl');
		  $this->mysmarty->display('admin/layout.tpl');
		}
		  
		  
	 function add_project($proj_id='')
 	 {
		 //echo date('n-Y', strtotime('2012-1105-05 12:39:1')); 
		$category=$this->projectmodel->get_category();
		//print_r($res);
		$users=$this->projectmodel->get_users();
		$durations=$this->projectmodel->get_duration();
		//print_r($res2);get_cities
		$cities=$this->projectmodel->get_cities();
	    $this->mysmarty->assign('category',$category);	
	    $this->mysmarty->assign('users',$users);	
	    $this->mysmarty->assign('durations',$durations);
		$this->mysmarty->assign('cities',$cities);		
		if($proj_id !=''){
		$project_det=$this->projectmodel->get_project_det($proj_id);
		}else{
			$project_det=0;
			}
		if(isset($_SESSION['responce'])){
			unset($_SESSION['responce']);
			$this->mysmarty->assign('response','Project saved successfully');
		}	
		else{
			//$this->mysmarty->assign('response','');
		}
		$this->mysmarty->assign('project_det',$project_det);	
	    $this->mysmarty->assign('middlecontent','admin/projects/add_project.tpl');	
	    $this->mysmarty->display('admin/layout.tpl');	
  	 }
	 
	 function post_project($proj_id =''){
		 if( isset($_POST) && $_POST['hidImage'] !=''){
		 if($proj_id =='')		 
		 $projectId=$this->projectmodel->post_project($_POST);
		 else
		 $projectId=$this->projectmodel->update_project($_POST,$proj_id);
		 $_SESSION['responce']='success';
		 redirect('admin/project/add_project/'.$projectId);
		 
		 }
	 }
	
	function remove_project_reward(){
		if( isset($_POST)){
			$re	= $this->projectmodel->remove_project_reward($_POST);
			echo $re;
		}
	}
	function edit_title_page(){
		$this->mysmarty->assign('vid_caption',$_POST['vid_caption']);	
		$this->mysmarty->display('admin/projects/edit_vid_title.tpl');	
	}
	
	function edit_imgtitle_page(){
		$this->mysmarty->assign('img_caption',$_POST['img_caption']);	
		$this->mysmarty->display('admin/projects/edit_img_title.tpl');	
	}
	function update_proj_video_title(){
		if( isset($_POST)){
			$re	= $this->projectmodel->update_proj_video_title($_POST);
			echo $re;
		}
	}
	function update_proj_image_title(){
		if( isset($_POST)){
			$re	= $this->projectmodel->update_proj_image_title($_POST);
			echo $re;
		}
	}
	 function unlink_project_image() 
	 {
		$removeImg	= $this->projectmodel->delete_project_image();
		echo $removeImg;
	 }  
	 
	 function unlink_project_video()
	 {
	 	$removeVid	= $this->projectmodel->delete_project_video();
		echo $removeVid;
	 }
	 
	 function searchCount()
	  {
		 $count = $this->projectmodel->searchcount_projects();
		 echo $count;
	  }
	 
	function project_list(){
	  $order= $this->input->post('order_by');
	  if($order == "")
	  {
			$order = "DESC_DATE";
	  }
	  $this->mysmarty->assign('orderBy',$order);	
	 // $fromPage= $this->input->post('url_type');
	//  $this->mysmarty->assign('from_page',$fromPage);
	  $projects = $this->projectmodel->manage_projects();
	  $this->mysmarty->assign('projects',$projects);
	  $this->mysmarty->assign('projectscount',count($projects));
	  $this->mysmarty->display('admin/projects/load_projects.tpl');
	}
	function refund_cash(){
	 $this->mysmarty->assign('middlecontent','admin/projects/refund_cash_list.tpl');
	  $this->mysmarty->display('admin/layout.tpl');
	}
	function refund_cash_list(){
		 $order= $this->input->post('order_by');
	  if($order == "")
	  {
			$order = "DESC_DATE";
	  }
	  $this->mysmarty->assign('orderBy',$order);	
	 // $fromPage= $this->input->post('url_type');
	//  $this->mysmarty->assign('from_page',$fromPage);
	  $refund_cash = $this->projectmodel->refund_cash_list();
	  $this->mysmarty->assign('refund_cash',$refund_cash);
	  $this->mysmarty->assign('refund_cashcount',count($refund_cash));
	  $this->mysmarty->display('admin/projects/load_refund_cash.tpl');
	}
	function refund_cash_list_count(){
		 $count = $this->projectmodel->refund_cash_list_cnt();
		 echo $count;
	}
	function del_select_projects(){
		 $order= $this->input->post('order_by');
	  	if($order == "")
	  	{
			$order = "DESC_DATE";
	  	}
	   $this->mysmarty->assign('orderBy',$order);
	   $this->projectmodel->del_selected_projects();
	   $projects = $this->projectmodel->manage_projects();
	  $this->mysmarty->assign('projects',$projects);
	  $this->mysmarty->assign('projectscount',count($projects));
	  $this->mysmarty->display('admin/projects/load_projects.tpl');
	}
	
	function change_status(){
		echo $status=$this->projectmodel->change_status();
	}
	
	function change_status_fund(){
		echo $status=$this->projectmodel->change_status_fund();
	}
	function viewproject1($proj_id){
		
	  $baseurl 	=	$this->config->base_url();
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  ######  Traceback To  PAYMENT DETAILS Page if latter is the request sender #################
	  $traceback=(($this->input->post('traceback')!='') ? $this->input->post('traceback') : '');
	  $this->mysmarty->assign('traceback',$traceback);
	  ##############################################################################################
	 /* $users 	= $this->projectmodel->view_project_details($proj_id,$baseurl);
	  $this->mysmarty->assign('project_det',$project_det);
	  $this->mysmarty->assign('fromPage',$frompage);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/viewuser.tpl');*/
	}
	function viewproject($prId='',$frompage='') 
  	{
	  $currP	  = $this->input->post('currP');
	  $orderBy	  = $this->input->post('order_by');
	  $proj_detil = $this->projectmodel->view_project_details($prId,base_url());
	  $this->mysmarty->assign('proj_details',$proj_detil);
	  $this->mysmarty->assign('fromPage',$frompage);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/projects/viewprojects.tpl');
  	}
	function project_description($prId){
		 $proj_detil = $this->projectmodel->view_project_details($prId,base_url());
		  $this->mysmarty->assign('proj_details',$proj_detil);
		  $this->mysmarty->display('admin/projects/project_desc.tpl');
	}
	function add_videos($proj_id){
		 $proj_videos=$this->projectmodel->get_project_videos($proj_id);
		 $this->mysmarty->assign('proj_videos',$proj_videos);		
		 $this->mysmarty->assign('proj_id',$proj_id);
		 $this->mysmarty->display('admin/projects/add_videos.tpl');
	}
	
	function project_comments($proj_id){
		
		 $proj_comments=$this->projectmodel->get_project_comments($proj_id);
		// echo '<pre>';print_r($proj_comments); echo '</pre>';
		 $this->mysmarty->assign('proj_comments',$proj_comments);		
		 $this->mysmarty->assign('proj_id',$proj_id);
		 $this->mysmarty->display('admin/projects/project_comments.tpl');
	}
	function update_project_comment(){
		if($_POST['comment_id'] !='') 
		echo $proj_comments=$this->projectmodel->update_project_comment($_POST);
	}
	
	function delete_project_comment(){
		if($_POST['comment_id'] !='') 
		echo $proj_comments=$this->projectmodel->delete_project_comment($_POST);
	}
	
	function admin_comments($proj_id){
		 $proj_comments=$this->projectmodel->get_admin_comments($proj_id);
		// echo '<pre>';print_r($proj_comments); echo '</pre>';
		 $this->mysmarty->assign('admin_comments',$proj_comments);		
		 $this->mysmarty->assign('proj_id',$proj_id);
		 $this->mysmarty->display('admin/projects/admin_comments.tpl');
	}
	
	function post_admin_comment(){
		if($_POST['comment'] !='' && $_POST['proj_id'] !='') 
		echo $proj_comments=$this->projectmodel->post_admin_comment($_POST);
	}
	
	function project_updates($proj_id){
		 $project_updates=$this->projectmodel->get_project_updates($proj_id);
		 $update_privilage=$this->projectmodel->get_project_update_priv($proj_id);
		// echo '<pre>';print_r($proj_comments); echo '</pre>';
		 $this->mysmarty->assign('project_updates',$project_updates);	
		 $this->mysmarty->assign('update_privilage',$update_privilage);		
		 $this->mysmarty->assign('proj_id',$proj_id);
		 $this->mysmarty->display('admin/projects/project_updates.tpl');
	}
	
	function update_proj_update($proj_id){
		if($_POST['comment_id'] !='' && $_POST['proj_id'] !='') 
		echo $proj_comments=$this->projectmodel->update_proj_update($_POST);
	}
	
	function post_admin_update(){
		if($_POST['comment'] !='' && $_POST['proj_id'] !='') 
		echo $proj_comments=$this->projectmodel->post_admin_update($_POST);
	}
	
	function update_update_permission(){
		if($_POST['proj_id'] !='') 
		echo $proj_comments=$this->projectmodel->update_update_permission($_POST);
	}
	 
	function project_backers($proj_id){  
		 $project_backers=$this->projectmodel->get_project_backers($proj_id);
		// echo '<pre>';print_r($proj_comments); echo '</pre>';
		 $this->mysmarty->assign('project_backers',$project_backers);	
		 $this->mysmarty->assign('proj_id',$proj_id);
		 $this->mysmarty->display('admin/projects/project_backers.tpl');
		
	}
	
	function add_youtube_video($proj_id)
	{
			$videourl=$this->input->post('you_tube_url');
			$url =parse_url($videourl);
			
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
				$videoInformation=array('videoid'=>$youtubevideoID,'thumbnail'=>$thumbnailurl,'videotype'=>'0','videourl'=>$videourl,'project_id'=>$proj_id,'errorcode'=>$errorcode);
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
	function create_video()
	{
		$type=$this->input->post('video_type');
		$video_file=$this->input->post('video_file');
		$vidImgfile=$this->input->post('vidImgfile');
		$project_id=$this->input->post('project_id');
		echo $this->projectmodel->insert_video($type,$video_file,$vidImgfile,$project_id);		
	}
	
	function add_vimeo_video($proj_id){
		$url =parse_url($this->input->post('vimeo_url'));
		
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
		$videoInformation=array('videoid'=>$vimeovideoID,'thumbnail'=>$thumbnailurl,'videotype'=>'2','videourl'=>$this->input->post('vimeo_url'),'project_id'=>$proj_id,'errorcode'=>0);
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
	
	
	function delete_project($proj_id){
	  $order= $this->input->post('order_by');
	  if($order == "")
	   {
		  $order = "DESC_DATE";
	   }
	  $this->mysmarty->assign('orderBy',$order);
	  $res=$this->projectmodel->delete_project($proj_id);	
	  $projects = $this->projectmodel->manage_projects();
	  $this->mysmarty->assign('projects',$projects);
	  $this->mysmarty->assign('projectscount',count($projects));
	  $this->mysmarty->display('admin/projects/load_projects.tpl');
	}
	
	function add_photos($proj_id){
		$proj_photos = $this->projectmodel->get_project_photos($proj_id);
		$this->mysmarty->assign('proj_photos',$proj_photos);
		$this->mysmarty->assign('proj_id',$proj_id);
		$this->mysmarty->display('admin/projects/add_photos.tpl');
	}
	
	function insert_project_photos() {
		//print_r($_POST); exit;
		$ins_ad = $this->projectmodel->insert_project_images();
		echo $ins_ad;
	}
	
	function play_videos_in_admin()
	{
		$videolink=$this->input->post('videolink');
		$videotype=$this->input->post('videotype');
		
		if($videotype ==1):
		//$videoextn=".flv";
		$videolink=$videolink;
		endif;
		
		$this->mysmarty->assign('videolink',$videolink);
		$this->mysmarty->assign('videotype',$videotype);
		$this->mysmarty->display('admin/projects/admin_videoplayer.tpl');	
	}
	
	function remove_proj_video(){
		$de= $this->projectmodel->remove_proj_video();
		echo $de;
	}
	
	function remove_proj_photos(){
		$de= $this->projectmodel->remove_proj_photo();
		echo $de;
	}
}
?>