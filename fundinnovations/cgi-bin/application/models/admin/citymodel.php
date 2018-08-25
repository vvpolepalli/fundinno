<?php


class citymodel extends  CI_Model
{
	function __construct()
    {
        parent::__construct();
		//$this->load->database();
		//$this->load->model('emailmodel');	
		//$this->load->library(array('phpsession','mysmarty'));
		
    }
	
	
	function  insert_city($post){
		$city_name 	= $post['city'];
		$country	= $post['country'];
		$state 	    = $post['state'];
		$qry = $this->db->query("select city_id from cities where city_name='".$city_name."'");
			if($qry->num_rows()>0) {
				$res = $qry->row();
				$city = $res->city_id;	
				return 'duplicate';
			} else
			{	
				$this->db->set('state_id',$state);
				$this->db->set('CountryID',$country);
				$this->db->set('city_name',$city_name);	
				$this->db->insert('cities');
				$city=$this->db->insert_id();
				return 'success';
			}
	}
	function update_city($post,$id){
		$city_name 	= $post['city'];
		$country	= $post['country'];
		$state 	    = $post['state'];
		$qry = $this->db->query("select city_id from cities where city_name='".$city_name."' and city_id != $id");
			if($qry->num_rows()>0) {
				$res = $qry->row();
				$city = $res->city_id;	
				return 'duplicate';
			} else
			{	
				$this->db->set('state_id',$state);
				$this->db->set('CountryID',$country);
				$this->db->set('city_name',$city_name);	
				$this->db->where('city_id',$id);	
				$this->db->update('cities');
				//$city=$this->db->insert_id();
				return 'success';
			}
	}
	function searchcount_city()
	{
		$city_name 	= $this->input->post('city_name');
		$country	= $this->input->post('country');
		$state 	= $this->input->post('state');
		
		$entry = array();	
		$i=0;
		if(!empty($city_name))
		{
			$entry[$i] = "city_name like '%".$city_name."%'";
			$i++;
		}
		
		if(!empty($country))
		{
			$entry[$i] = "c.CountryID ='".$country."'";
			$i++;
		}
		if(!empty($state))
		{
			$entry[$i] = "state_id ='".$state."'";
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
		
		
		$sql = "select count(*) as count from cities  c left join country cn on cn.countryid=c.CountryID left join states s on c.state_id=s.st_id  ".$sqlentry." ";
		$query = $this->db->query($sql);
		$qryres = $query->row();
		return $qryres->count;
		
	}
	function manage_cities()
	{
		
		//echo '<pre>'; print_r($_POST);echo '</pre>';
		$startp	= $this->input->post('startp');
		$limitp	= $this->input->post('limitp');
		$city_name 	= $this->input->post('city_name');
		$country	= $this->input->post('country');
		$state 	= $this->input->post('state');
		
		$orderBy = $this->input->post('order_by');
		
		
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		if($orderBy=='ASC_NAME') {
			$order = " city_name ASC";	
		}
		else if($orderBy=='DESC_NAME'){
			$order = " city_name DESC";	
		}
		else if($orderBy=='ASC_STATE'){
			$order = " s.state ASC";	
		}
		else if($orderBy=='DESC_STATE'){
			$order = " s.state DESC";	
		}
		else if($orderBy=='ASC_COUNTRY'){
			$order = " cn.country ASC";	
		}
		else if($orderBy=='DESC_COUNTRY'){
			$order = " cn.country DESC";	
		}
		else {
			$order = " city_id DESC";	
		}
		
		$entry = array();	
		$i=0;
		
		if(!empty($city_name))
		{
			$entry[$i] = "city_name like '%".$city_name."%'";
			$i++;
		}
		
		if(!empty($country))
		{
			$entry[$i] = "c.CountryID ='".$country."'";
			$i++;
		}
		if(!empty($state))
		{
			$entry[$i] = "state_id ='".$state."'";
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
		$sql = "select c.*,s.state,cn.country from cities c left join country cn on cn.countryid=c.CountryID left join states s on c.state_id=s.st_id ".$sqlentry." limit $startp,$limitp";
		//echo $sql;
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$result = $query->result();
			return $result;
		}
		if($query->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				
				$delstartp = $startp-$limitp;
			} else {
				$delstartp = 0;
			}
			$sqldel = "select c.*,s.state,cn.country from cities c left join country cn on cn.countryid=c.CountryID left join states s on c.state_id=s.st_id ".$sqlentry." limit $delstartp,$limitp";
				
				$querydel = $this->db->query($sqldel);
				$resultdel = $querydel->result();
				return $resultdel;
		}
	}
	
	function get_city($id){
		$sql = "select c.*,s.state,cn.country from cities c left join country cn on cn.countryid=c.CountryID left join states s on c.state_id=s.st_id where city_id=".$id;
				
				$query = $this->db->query($sql);
				$result = $query->result_array();
				return $result[0];
	}
	
	//Function To Delete city
	function delete_city($id)
	{
		$sqlimg = $this->db->query("select * from cities where city_id ='".$id."'");
		/*if($sqlimg->num_rows()>0)
		{
			
		}*/
		$sqlqry=$this->db->query("delete from cities where city_id ='".$id."'");
		return 'deleted';
	}
}
?>