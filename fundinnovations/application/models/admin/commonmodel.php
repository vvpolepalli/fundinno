<?php
/***************************************************************************
File Name		: commonmodel.php
Created Date	: 14-11-2012
Author			: Pramod Kumar C. K
****************************************************************************/

class Commonmodel extends  CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	function get_banner_images(){
		$sql="select * from home_img_banner ";
		$query=$this->db->query($sql); 
		$res=$query->result_array();
		return $res; 
	}
	function insert_banner_photos(){
		$today		= date('Y-m-d H:i:s');
		$thumb_img_name=$_POST['image']; 
		$sql="insert into home_img_banner (image,status,date) values ('".$thumb_img_name."',1,'".$today."')";
		$query=$this->db->query($sql); 
		return 'inserted';
	}
	function tot_projects(){
		$sql="select * from projects ";
		$query=$this->db->query($sql); 
		$res=$query->result_array();
		return count($res); 
	}
	function fun_projects(){
		$sql="select
		count(id) as tot_projs,
		SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END) AS approved_projs,
		SUM(CASE WHEN status = 'pending'  THEN 1 ELSE 0 END) AS pending_projs,
		SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END) AS rejected_projs,
		SUM(CASE WHEN status = 'incomplete' THEN 1 ELSE 0 END) AS incomplete_projs,
		SUM(CASE WHEN project_status = 'ongoing' THEN 1 ELSE 0 END) AS ongoing_projs,
		SUM(CASE WHEN project_status = 'success' THEN 1 ELSE 0 END) AS success_projs,
		SUM(CASE WHEN project_status = 'failed'  THEN 1 ELSE 0 END) AS failed_projs
		from projects ";
		$query=$this->db->query($sql); 
		$res=$query->result_array();
		return $res[0]; 
	}
	function projects_funds(){
		/*$sq="select 
		SUM(if(pf.fund_via='backed' && pf.status ='completed',pf.amount,0)) total_cash, 
		SUM(if((p.project_status='success')&& (pf.fund_via='backed') ,pf.amount,0)) succes_cash, 
		SUM(if((p.project_status='failed') ,pf.amount,0)) failed_cash, 
		SUM(if((pf.fund_via='refunded') && (fc.cash >= 0),fc.cash,0)) refunded_cash, 
		   SUM(if(pf.fund_via='referral',pf.amount,0)) referral_cash,
 abs(SUM(if( fc.cash < 0,fc.cash,0))) reinvested_cash,
 SUM(if( pf.admin_refunded =1,pf.transfer_amount,0)) withdrawn_cash ,
 SUM(if( pf.admin_refunded !=1,fc.cash,0)) tot_refund_cash 
from project_funds pf 
left join fundinnovation_cash fc on pf.id = fc.order_id
join projects p on pf.project_id = p.id ";*/
	$sql_succes="SELECT group_concat( id ) success_projs
	FROM projects
	WHERE project_status = 'success'";
	$query_succes=$this->db->query($sql_succes); 
	$res_succes=$query_succes->result_array();
	//print_r();
	if($res_succes[0]['success_projs'] !=''){
	$sql_succes_funds="select sum(if((pf.fund_via='backed' &&  pf.status ='completed')   ,pf.amount,0)) succes_cash from project_funds pf where pf.project_id in (".$res_succes[0]['success_projs'].")";
	//echo $sql_succes_funds;
	$query_succes_funds=$this->db->query($sql_succes_funds); 
	$res_succes_funds=$query_succes_funds->result_array();
	}else{
		$res_succes_funds[0]['succes_cash']=0;
	}
	
	$sql_ongoing="SELECT group_concat( id ) ongoing_projs
	FROM projects
	WHERE project_status = 'ongoing'";
	$query_ongoing=$this->db->query($sql_ongoing); 
	$res_ongoing=$query_ongoing->result_array();
	//print_r();
	if($res_ongoing[0]['ongoing_projs'] !=''){
	$sql_ongoing_funds="select sum(if((pf.fund_via='backed' && pf.status ='completed'),pf.amount,0)) ongoing_cash from project_funds pf where pf.project_id in (".$res_ongoing[0]['ongoing_projs'].")";
	//echo $sql_succes_funds;
	$query_ongoing_funds=$this->db->query($sql_ongoing_funds); 
	$res_ongoing_funds=$query_ongoing_funds->result_array();
	}else{
		$res_ongoing_funds[0]['ongoing_cash']=0;
	}
	
	$sql_failed="SELECT group_concat( id ) failed_projs
	FROM projects
	WHERE project_status = 'failed'";
	$query_failed=$this->db->query($sql_failed); 
	$res_failed=$query_failed->result_array();
	
	if($res_failed[0]['failed_projs'] !=''){
	$sql_failed_funds="select sum(if(pf.fund_via='refunded' ,pf.amount,0)) failed_cash from project_funds pf where pf.project_id in (".$res_failed[0]['failed_projs'].")";
	//echo $sql_succes_funds;
	$query_failed_funds=$this->db->query($sql_failed_funds); 
	$res_failed_funds=$query_failed_funds->result_array();
	}else{
		$res_failed_funds[0]['failed_cash']=0;
	}
$sq="select 
		SUM(if((pf.fund_via='backed' || pf.fund_via='refunded') && (pf.status ='completed' || pf.status ='refunded'),pf.amount,0)) total_cash, 
		SUM(if((pf.fund_via='refunded'),pf.amount,0)) refunded_cash, 
		SUM(if(pf.fund_via='referral' && pf.status ='completed',pf.amount,0)) referral_cash,
 		SUM(if(pf.status !='pending' && pf.status != 'deleted' && pf.status !='error',pf.fundinnovation_cash,0)) reinvested_cash
		from project_funds pf ";
		$query=$this->db->query($sq); 
		$res=$query->result_array();
		$sql_withdrn="select sum(cash) withdrawn_cash from fundinnovation_cash where order_id=0";
		$querywthdrwn=$this->db->query($sql_withdrn); 
		$reswdth=$querywthdrwn->result_array();
		$res[0]['withdrawn_cash'] = $reswdth[0]['withdrawn_cash'];
		$res[0]['succes_cash']  = $res_succes_funds[0]['succes_cash'];
		$res[0]['failed_cash']  = $res_failed_funds[0]['failed_cash'];
		$res[0]['ongoing_cash'] = $res_ongoing_funds[0]['ongoing_cash'];
		return $res[0]; 
	}
	function remove_banner_img(){
	//	$proj_id  = $this->input->post('project_id');
		$photo_id      = $this->input->post('photo_id');
		
		$this->db->where('id',$photo_id);
		$qry=$this->db->get('home_img_banner');
		$res=$qry->result_array();
		if($qry->num_rows>0){
			$sql=$this->db->query("delete from home_img_banner where id ='$photo_id'");
			//if($res[0]['type'] ==1){
				$this->unlink_banner_img($res[0]['image']);
			//}
		}
		
	}
	function unlink_banner_img($path){
	
		$thumbImg 	= UPLOAD_PATH.'uploads/image_banner/thumb/'.$path;
		$largeImg	= UPLOAD_PATH.'uploads/image_banner/original/'.$path;
		$smallImg	= UPLOAD_PATH.'uploads/image_banner/small/'.$path; 
		if(file_exists($largeImg)) {
			unlink($largeImg);	
		}
		if(file_exists($thumbImg)) {
			unlink($thumbImg);	
		}
		if(file_exists($smallImg)) {
			unlink($smallImg);	
		}	
	}
	
	
	function get_media_images(){
		$sql="select * from media ";
		$query=$this->db->query($sql); 
		$res=$query->result_array();
		return $res; 
	}
	
	
	function get_media_imagebyid($id){
		$sql="select * from media where id=".$id;
		$query=$this->db->query($sql); 
		$res=$query->result_array();
		return $res; 
	}
	
	function insert_media_image(){
		$created_date   = date('Y-m-d H:i:s');
		$Image1		= $this->input->post('image');
		$media_url    = $this->input->post('media_url');
		
		$this->db->set('link',$media_url);
		$this->db->set('image',$Image1);
		$this->db->set('status','1');
		$this->db->set('date',$created_date);
		$this->db->insert('media');
	}
	
	
	function update_media_image(){
	
		//$created_date   = date('Y-m-d H:i:s');
		$Image1		= $this->input->post('image');
		$media_url  = $this->input->post('media_url');
		$media_id   = $this->input->post('media_id');
		
		$media=$this->get_media_imagebyid($media_id);
		if(count($media)>0){
				
		if($media[0]['image'] != $Image1 )	
		$this->unlink_media_img($media[0]['image']);
		
		$this->db->set('link',$media_url);
		$this->db->set('image',$Image1);
		$this->db->where('id',$media_id);
		//$this->db->set('date',$created_date);
		$this->db->update('media');
		}
		
	}
	
	function remove_media_img(){
	//	$proj_id  = $this->input->post('project_id');
		$photo_id      = $this->input->post('photo_id');
		
		$this->db->where('id',$photo_id);
		$qry=$this->db->get('media');
		$res=$qry->result_array();
		if($qry->num_rows>0){
			$sql=$this->db->query("delete from media where id ='$photo_id'");
			//if($res[0]['type'] ==1){
				$this->unlink_media_img($res[0]['image']);
			//}
		}
		
	}
	
	function unlink_media_img($path){
	
		$thumbImg 	= UPLOAD_PATH.'uploads/media_images/'.$path;
	//	$largeImg	= UPLOAD_PATH.'uploads/media_images/'.$path;
		//$smallImg	= UPLOAD_PATH.'uploads/image_banner/'.$path; 
		/*if(file_exists($largeImg)) {
			unlink($largeImg);	
		}*/
		if(file_exists($thumbImg)) {
			unlink($thumbImg);	
		}
		/*if(file_exists($smallImg)) {
			unlink($smallImg);	
		}*/	
	}
}
?>