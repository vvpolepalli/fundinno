<?php
/***************************************************************************
File Name		: categorymodel.php
Created Date	: 31-10-2012
Author			: Pramod
****************************************************************************/

class Categorymodel extends  CI_Model
{
	function __construct()
    {
        parent::__construct();
		//$this->load->database();
		//$this->load->library(array('phpsession','mysmarty'));
		
    }
	
	function category_parent_list(){
		$this->db->select('*');
        $this->db->from('category');
		$this->db->where('parent_id',0);
        $query = $this->db->get();	
		if ($query->num_rows() > 0)
		    return $query->result_array();
		else
		   	return 0;	
	}
	
	function category_parent_list_byid($id){
		$this->db->select('*');
        $this->db->from('category');
		$this->db->where('parent_id',0);
		$this->db->where('id !=',$id);
        $query = $this->db->get();	
		if ($query->num_rows() > 0)
		    return $query->result_array();
		else
		   	return 0;	
	}
	
	function insert_new_category($post){
		
		$created= date('Y-m-d G:i:s');
		
		if($post['category'] !=''){
		
		$category=  addslashes($post['category']);
		$this->db->set('category_name',$category);
		
		if($post['parent_category'] != '')
		$this->db->set('parent_id',$post['parent_category']);
		
		if($post['description'] != '')
		$this->db->set('description',$post['description']);
		
		$this->db->set('status',1);
		$this->db->set('create_date',$created);
		$this->db->insert('category');
		return 'success';
		}
		else{
			return 'failed';
		}
	}
	function check_category($post){
		if($post['cat_id'] !='')
		$sq="select id from category where category_name='".addslashes($post['cat'])."' and id !=".$post['cat_id'];
		else 
		$sq="select id from category where category_name='".addslashes($post['cat'])."'";
		$query = $this->db->query($sq);
		if($query->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}
	function searchcount_category()
	{
		$category 	= $this->input->post('category');
		
		$entry = array();	
		$i=0;
		if(!empty($category))
		{
			$entry[$i] = "category_name like '%".mysql_real_escape_string($category)."%'";
			$i++;
		}
		
		
		$sqlentry = "";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$sqlentry = " where ".$data;
			else
			$sqlentry .= " and ".$data;
			
			$j++;
		}
		
		
		$sql = "select count(*) as cnt from category ".$sqlentry." ";
		$query = $this->db->query($sql);
		$qryres = $query->row();
		return $qryres->cnt;
	}
	
   function category_list()
	{
		
		//echo '<pre>'; print_r($_POST);echo '</pre>';
		$startp	= $this->input->post('startp');
		$limitp	= $this->input->post('limitp');
		$category 	= $this->input->post('category');
		
		//$type 	= $this->input->post('user_type');
		$orderBy = $this->input->post('order_by');
		
		
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		if($orderBy=='ASC_NAME') {
			$order = " category_name ASC";	
		}
		else if($orderBy=='DESC_NAME'){
			$order = " category_name DESC";	
		}else if($orderBy=='DESC_PARENT'){
			$order = " parent DESC";	
		}else if($orderBy=='ASC_PARENT'){
			$order = " parent ASC";	
		}
		else  {
			$order = " create_date DESC";	
		}
		
		$entry = array();	
		$i=0;
		if(!empty($category))
		{
			$entry[$i] = "category_name like '%".mysql_real_escape_string($category)."%'";
			$i++;
		}
		
		
		
		$sqlentry = "";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$sqlentry = " where  ".$data;
			else
			$sqlentry .= " and ".$data;
			
			$j++;
		}
		$sqlentry .=" order by $order";
		$sql = "select *,(select category_name from category c1 where c1.id=c.parent_id) as parent from category c ".$sqlentry." limit $startp,$limitp";
		//echo $sql;
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$result = $query->result();
			//return $result;
		}
		elseif($query->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				
				$delstartp = $startp-$limitp;
			} else {
				$delstartp = 0;
			}
			$sqldel = "select *,(select category_name from category c1 where c1.id=c.parent_id) as parent from category c ".$sqlentry." limit $delstartp,$limitp";
				
				$querydel = $this->db->query($sqldel);
				$resultdel = $querydel->result();
				$result= $resultdel;
		  }
		  foreach($result as $k=>$r){
			  if($r->staff_pick_project_id !='' && $r->staff_pick_project_id !=0){
				  $staff_pick=$this->get_project_title($r->staff_pick_project_id);
				  $result[$k]->staff_pick_project = $staff_pick[0]['project_title'];
			  }
			  else
			  {
				   $result[$k]->staff_pick_project='';
			  }
		  }
	 return $result;
	}
	function get_project_title($proj_id){
		$this->db->select('project_title');
        $this->db->from('projects');
		$this->db->where('id',$proj_id);
		$this->db->where('status','approved');
        $query = $this->db->get();	
		if ($query->num_rows() > 0)
		    return $query->result_array();
		else
		   	return 0;
	}
	
	function get_projects_bycatid($post){
		$childs=$this->get_child_category($post['category_id']);
		if(count($childs)>0 && $childs !=0)
		foreach($childs as $ch){
			$child_list[]=$ch['id'];
		}
		else
		$child_list=0;
	//	$child_ids=implode(',',$child_list);
	//	echo '<pre>';print_r($child_ids);echo '</pre>';
		$this->db->select('id,project_title');
        $this->db->from('projects');
		$this->db->where('category_id',$post['category_id']);
		$this->db->where('status','approved');
		$this->db->or_where_in('category_id', $child_list);
		
        $query = $this->db->get();
		//echo $this->db->last_query();	 
		if ($query->num_rows() > 0)
		    return $query->result_array();
		else
		   	return 0;
	}
	function get_child_category($catid){
		$this->db->select('id');
        $this->db->from('category');
		$this->db->where('parent_id',$catid);
        $query = $this->db->get();	
		if ($query->num_rows() > 0)
		    return $query->result_array();
		else
		   	return 0;
	}
	function get_category_ById($cat_id)
	{
		$this->db->select('*');
        $this->db->from('category');
		$this->db->where('id',$cat_id);
        $query = $this->db->get();	
		if ($query->num_rows() > 0)
		    return $query->result_array();
		else
		   	return 0;
	}
	
	function select_category()
	{
		$this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();	
		if ($query->num_rows() > 0)
		    return $query->result_array();
		else
		   	return 0;
	}
	
	function update_category($post)
	{
		//$created= date('Y-m-d G:i:s');
		
		if($post['category'] !='' && $post['hid_catid'] !=''){
		
		$category=  $post['category'];
		$this->db->set('category_name',$category);
		
		if($post['parent_category'] != '')
		$this->db->set('parent_id',$post['parent_category']);
		else
		$this->db->set('parent_id',0);
		
		if($post['description'] != '')
		$this->db->set('description',$post['description']);
		
		$this->db->where('id',$post['hid_catid']);
		
		$this->db->update('category');
		return 'success';
		}
		else{
			return 'failed';
		}
	}
   
  function change_staff_pick($post){
	  
	$this->db->set('staff_pick_project_id',$post['project_id']);
	$this->db->where('id',$post['category_id']);
	$this->db->update('category');
	return 'success';
  }
	
   function del_selected_category()
	{
		$clists=$this->input->post('category_ids');
		$clist =explode(",", $clists);
		$count=count($clist);
		$i=0;
		while($count>0)
		{
			
			$this->db->where('id',$clist[$i]);
			$this->db->or_where('parent_id',$clist[$i]);
			$this->db->delete('category');
			
			$i++;	
			$count--;	
		}
		return "Deleted";
	}
	
   
   function delete_category($catid)
   {
		$sqlqry=$this->db->query("delete from category where id ='".$catid."' or parent_id='".$catid."'");
		
		return 'deleted';
    }
}
?>