<?php 

class Ebsmodel extends CI_Model{
   function __constrtuct()
	{
		parent::__construct();

	}
	public function _load_ebs_credentials()

	{
		try
		{
		$credentails=self::fetch_ebs_credentials();
		return json_encode($credentails);
		}	
		catch(Exception $e)
		{
			die($e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>');  	
		}

	}

	protected function fetch_ebs_credentials()
	{
		try
		{
	   $this->sql="SELECT  	account_id, account_name, secret_key
 					FROM ebs_payment_credentials order by account_id DESC LIMIT 0,1";

					/*$this->sql="SELECT  

							5880,

							 'ebs' as account_name,

							'".MY_EBS_KEY."' as secret_key";*/

			$credentials=$this->db->query($this->sql);

			return $credentials->result_array();

		}
		catch(Exception $e)
		{
			die($e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>');  
		}


	}

/*INSERT into  ebs_payment_credentials(`account_id`,`account_name`,`secret_key`,`entry_date`) 

VALUES

 (12733,AES_ENCRYPT('Oneoverpi Solutions Private Limited', 'cb37e1633db4ff048d6dbd08f61db52b'),

AES_ENCRYPT('9ea31ea7a4287d9425db3738475f88a6', 'cb37e1633db4ff048d6dbd08f61db52b'),

NOW())





SELECT  AES_DECRYPT(`account_name`,'cb37e1633db4ff048d6dbd08f61db52b'),

AES_DECRYPT(`secret_key`,'cb37e1633db4ff048d6dbd08f61db52b')

 FROM `ebs_payment_credentials` */

}

?>