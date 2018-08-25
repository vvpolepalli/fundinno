<?php
/***************************************************************************
File Name		: UserModel.php
Created Date	: 12-01-2012
Author			: SCA
****************************************************************************/

class Admin_user_model extends  CI_Model
{
	  function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library(array('phpsession','mysmarty'));
		
    }
    //Login Function
     function checkValidLogin($adminLoginName,$adminPassword)
	  {
		$this->db->select('admin_id');
        $this->db->from('admin');
		$this->db->where('user_name', $adminLoginName); 
		$this->db->where('password', $adminPassword); 
        $query = $this->db->get();	
		if ($query->num_rows() > 0)
		    return 1;
		else
		   	return 0;		
	   }
	   
	//Function for logout
	function logout()
	{
		//Admin session
		$this->phpsession->clear('adminid');
		$this->phpsession->clear('adminname');
		$this->phpsession->clear('adminlogin');
	}
	//Function for Update Admin Profile
	function updateprofile()
	{
		$adminName = $this->input->post('adminName');
		$adminEmail = $this->input->post('adminEmail');
		$adminLoginName = $this->input->post('adminLoginName');
		$adminPassword = $this->input->post('adminPassword');
		$md5_usr_passwd = md5($adminPassword);
		//Session Set
		$this->phpsession->save('ExistingLoginName',$adminLoginName);
		$this->phpsession->save('adminname',$adminName);
		/*******/
		$adm_passchange=$this->input->post('adm_passchange');
		if($adm_passchange==1)
		{
			
		$res=$this->db->query("UPDATE meida_admin SET adminName='".$adminName."',adminLoginName='".$adminLoginName."',adminPassword='".$md5_usr_passwd."',adminEmail='".$adminEmail."' WHERE adminID = 1 ");
		}
		else
		{
			$res=$this->db->query("UPDATE meida_admin SET adminName='".$adminName."',adminLoginName='".$adminLoginName."',adminEmail='".$adminEmail."' WHERE adminID = 1 ");
		}
	    return "<font color=green>Updated Successfully</font>";	
		
	}
	
	//Function To Get Profile Details
	function profiledetails()
	{
		
		$q=$this->db->query("select * from meida_admin where adminID = 1");
		$res=$q->row();
		return $res;
	}
//Function To Check AdminPassword
	function check_currentpass()
	{
		$adminLoginName = $this->input->post('adminLoginName');
		$admpass = $this->input->post('current_password');
		$q = $this->db->query("select adminPassword,adminLoginName from meida_admin where adminID = 1");
		$getadm = $q->row();
		$md5_pass = $getadm->adminPassword;
		$adminname = $getadm->adminLoginName; 
		$current_password = md5($admpass);
		$sqladmchk = $this->db->query("select * from meida_admin where adminLoginName='".$adminLoginName."' and adminPassword ='".$current_password."'");
		return $sqladmchk->num_rows();
				
		
	}
	
	function change_user_password($currentpwd,$newpwd,$username)
	{
		$this->db->select('admin_id');
        $this->db->from('admin');
		$this->db->where('user_name', $username); 
		$this->db->where('password', md5($currentpwd)); 
        $query = $this->db->get();		
		if ($query->num_rows() > 0)
		   {		   
			$data = array('password' => md5($newpwd));
			$this->db->where('user_name', $username);
			$this->db->update('admin', $data); 
			return 'success';
		   }
		   else
		   {
			    return 'fail';
		   }
	}
	function change_email_id($email,$username){
		
		$this->db->select('admin_id');
        $this->db->from('admin');
		$this->db->where('user_name', $username); 
		//$this->db->where('password', md5($currentpwd)); 
        $query = $this->db->get();	
		
		if ($query->num_rows() > 0)
		   {		   
			$data = array('user_name' => $email);
			$this->db->where('user_name', $username);
			$this->db->update('admin', $data); 
			echo $this->db->last_query(); 	
			$this->phpsession->save('username',$email);
			return 'success';
		   }
		   else
		   {
			    return 'fail';
		   }
	}
	function make_new_password($username)
	{	
		$baseurl = base_url();	
		$this->db->select('admin_id');
        $this->db->from('admin');
		$this->db->where('user_name', $username);		
        $query = $this->db->get();		
		if ($query->num_rows() > 0)
		   {		   
			$pwd=uniqid();
			$newpwd=md5($pwd);
			$data = array('password' => $newpwd);			
			$this->db->where('user_name', $username);
			$this->db->update('admin', $data); 
			$content='		
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Password Changed</title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" width="100%" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						  <p class="textfild_p">Hi Admin</p>
						 <p class="textfild_p">Your Fundinnovation admin login password has been changed as per your request. The new Password is given below :</p>
						</td>
					   </tr>
                       <tr>
           <td valign="top" style="padding:4px;" width="100">
            User id
           </td>
           <td valign="top"  style="padding:4px;">
            : admin@fundinnovation.com
           </td>
          </tr>
		  <tr>
			 <td valign="top" style="padding:4px;">
           New Password
           </td>
           <td valign="top" style="padding:4px;">
           	: '.$pwd.'
           </td>
          </tr>	
		     
                     
         </table>
        </p>
				              </td>
      </tr>
	  
    </table></td>
  </tr>
 <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr></table>
			<map name="Map" id="Map">
  <area shape="rect" coords="24,3,174,102" href="#" />
</map>
</body>
</html>
			';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//$headers .= 'To: sumesh_c@ispg.in' . "\r\n";
			$headers .= 'From: fundinnovation admin <admin@fundinnovation.com>' . "\r\n";
			$headers .= "Bcc: pramod_ck@ispg.in";
			mail($username,'The new password',$content,$headers);
			return 'success';
		   }
		   else
		   {
			    return 'fail';
		   }
	}
		
}
?>