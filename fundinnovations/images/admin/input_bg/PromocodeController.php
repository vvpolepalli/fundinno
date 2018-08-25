<?php

class PromocodeController extends Controller
{
 
  public function indexAction()
  {
		$ObjPromocode              	=	new PromocodeModel();
		$ObjCurrency    			= 	new CurrenciesModel();
		
		//change status
		 if(isset($_POST['changeStatus'])){
			if(count($_POST['checkpromoIDs'])>0){
				
			   $changestatus= $ObjPromocode->changePromoCodeStatus($_POST);
			   
			   if($changestatus && $_POST['changeStatus']=="Deleted"){
				 $this->setMessage("language.msgPromocodeDelete","success");
				 
			   } elseif($changestatus){
				
			   		$this->setMessage("language.msgPromocodeUpdateStatus","success");
			  
			   } 
			   $this->setRedirect();
			}
		}
		//search functions
		if(isset($_POST['submitSearch'])){
   
			if($_POST['promoName']!=''){
				
				 $link    =   'promocode/index/';
				 $link   .=   'promoName/'.trim(urlencode(addslashes($_POST['promoName']))).'/';
			}
    		$this->setRedirect($link);
  		}
		
		$promoName 					= 	urldecode($this->getRequestValue('promoName'));
				
		list($limitFrom,$limitTo)   =   $this->getPageSettings($key='page',$rows=10);
		$resListPromocodes		   	=	$ObjPromocode->listPromoCodes($limitFrom,$limitTo,$promoName);
		$resPagesCount		   		=	$this->setPagesCount($key='page');
		
		//get default currency
		$resDefaultCurrency			=	$ObjCurrency->getDefaultCurrencyDetails($this->getSettingValue('site_settings','default_currency'));
		$this->ObjView->assign('resDefaultCurrency',$resDefaultCurrency);
		
		$this->ObjView->assign('defaultDateFormat', $this->getSettingValue('site_settings','date_format')); 
		$this->ObjView->assign('promoName', $promoName); 
		$this->ObjView->assign('resListPromocodes', $resListPromocodes);		
		$this->ObjView->display('PromocodeList.tpl');
  }
  
  
  public function newAction()
  {
		$promoID 		=   $this->getRequestValue('id');
		//initialize object
		$ObjPromocode 	= 	new PromocodeModel();
		$ObjDeal        = 	new DealModel();
		$ObjCurrency    = 	new CurrenciesModel();
		$ObjLanguage	=	new LanguageModel();
		
		$languageIDs		= 	$ObjLanguage->getLanguageIDs();
		
		$defaultLanguageID  =	$languageIDs['Default'];
		$currentLanguageID  = 	$languageIDs['Current'];
		
		
		//To get selected Deals
		$dealIDs				=	'';
		$seldealIDs				=	'';		
		
		if($this->ObjForm->isValid('formPromocode','submitPromocode')) {
			
		  //get selected DealIDs
		  if($_POST['selectedPromoDealIDs']!='' && $_POST['promoEffectOnDeals']!='All') {
			  
			$dealIDs				=	$ObjPromocode->explodeDealIDs($_POST['selectedPromoDealIDs']);
			$seldealIDs				=	str_replace("'","",$dealIDs);
			
		  } 
		  
		  $resListUpcomingDeals		=	$ObjDeal->listUpcomingDeals($defaultLanguageID,'Active',$dealIDs,'','N');
		
		  //Add promo codes to table
		  
		  $promoInsert				= 	$ObjPromocode->savePromocodeDetails($_POST,$promoID,$seldealIDs,$resListUpcomingDeals);
		  
		  $this->setMessage("language.msgPromocodeAdd","success");
		  $this->setRedirect("/promocode/");
				
        }
		
		
		$previousURL			=	$this->getPreviousURL();
	    $this->ObjView->assign('previousURL', $previousURL);
		
		$this->ObjView->assign('defaultDateFormat', $this->getSettingValue('site_settings','date_format')); 
		$this->ObjView->assign('currentDate', date("d-m-Y"));		
		$this->ObjView->display('PromocodeAdd.tpl');
		
  }

  public function editAction()
  {
		$promoID 		=   $this->getRequestValue('id');
				
		//initialize object
		$ObjPromocode 	= 	new PromocodeModel();
		$ObjDeal        = 	new DealModel();
		$ObjCurrency    = 	new CurrenciesModel();
		$ObjLanguage	=	new LanguageModel();
		
		$languageIDs		= 	$ObjLanguage->getLanguageIDs();
		
		$defaultLanguageID  =	$languageIDs['Default'];
		$currentLanguageID  = 	$languageIDs['Current'];
		
		$this->ObjView->assign('promoID', $promoID);
		
		//To get selected Deals
		$dealIDs				=	'';
		$seldealIDs				=	'';
		$PromoDeals				=	'';
		
		//Get details in edit mode
		$resPromoCodeDetails	=    $ObjPromocode->getPromoCodeDetails($promoID);
		
		if($resPromoCodeDetails){			
			
			$promoCodeLength	=	strlen($resPromoCodeDetails['promoCode']);
			
			$this->ObjView->assign('promoCodeLength', $promoCodeLength);
			
			$this->ObjView->assignValues($resPromoCodeDetails);
			
			//get Added Promo DealIDs
		
			$resPromoDealIDs		=	$ObjPromocode->listPromoDealIDs($promoID);
			
			if($resPromoCodeDetails['promoStatus']=='Deleted') {
				
				$this->setRedirect("/promocode/");
			}
			
		} else {
			
			$this->setRedirect("/promocode/");
		
		}
		
		if($_POST['selectedPromoDealIDs']!='') {
			$PromoDeals			=	$_POST['selectedPromoDealIDs'];
			$promoEffectOnDeals	=	$_POST['promoEffectOnDeals'];
	  	} else {
		
			$PromoDeals			=	$resPromoDealIDs;
			
			$promoEffectOnDeals	=	$resPromoCodeDetails['promoEffectOnDeals'];
	  	}		
		
		if($resPromoCodeDetails['promoStatus']=='Used') {
					
			$dealStatus			=	'';	
		 } else {
			
			$dealStatus			=	'Deleted';	
		 }
			
			
		if($promoEffectOnDeals=='All') {
			$PromoDeals		=	'';
			
		} elseif($promoEffectOnDeals=='Except' && $_POST['selectedPromoDealIDs']=='') {
			
			$dealIDs				=	$ObjPromocode->explodeDealIDs($PromoDeals);
			
			//To get Excepted Deals
			$resListExceptDeals		=	$ObjDeal->listUpcomingDeals($defaultLanguageID,$dealStatus,$dealIDs,'','N');
			
			$resListExceptDealIDs	=	(@array_map(array($ObjPromocode, 'implodeSymbols'),$resListExceptDeals));
			
			if(!empty($resListExceptDealIDs)) {
			
				$PromoDeals			=	implode("~*",$resListExceptDealIDs);	
			}		
			
			
		}	
		
		if($this->ObjForm->isValid('formPromocode','submitPromocode')) {
			
			  
			 
			if($PromoDeals!='' &&  $promoEffectOnDeals!='All') {
				
				$dealIDs				=	$ObjPromocode->explodeDealIDs($PromoDeals);
				$seldealIDs				=	str_replace("'","",$dealIDs);
			} 
			
			//To get Active Deals
			$resListUpcomingDeals		=	$ObjDeal->listUpcomingDeals($defaultLanguageID,$dealStatus,$dealIDs,'','N');
			
		  	//Update promo codes to table
		  
		  	$promoUpdate			= 	$ObjPromocode->savePromocodeDetails($_POST,$promoID,$seldealIDs,$resListUpcomingDeals);
		  
		  	$this->setMessage("language.msgPromocodeUpdate","success");
		  	$this->setRedirect("/promocode/");
				
        }
		
		//Assign links for cancel button
		$previousURL			=	$this->getPreviousURL();		
		
	    $this->ObjView->assign('previousURL', $previousURL);
		
		$this->ObjView->assign('PromoDeals', $PromoDeals);
		$this->ObjView->display('PromocodeAdd.tpl');
		
  }
  
  public function showAction()
  {
    
		$promoID 		=   $this->getRequestValue('id');
				
		//initialize object
		$ObjPromocode 	= 	new PromocodeModel();
		$ObjCurrency    = 	new CurrenciesModel();
		$ObjDeal		=	new DealModel();
		$ObjLanguage	=	new LanguageModel();
		
		$languageIDs		= 	$ObjLanguage->getLanguageIDs();
		
		$defaultLanguageID  =	$languageIDs['Default'];
		$currentLanguageID  = 	$languageIDs['Current'];
		
		$resPromoDealIDs	=	'';
		
		//get promo code details
		$resPromoCodeDetails=    $ObjPromocode->getPromoCodeDetails($promoID);		
		
   	 	if($resPromoCodeDetails){			
		
        	$this->ObjView->assignValues($resPromoCodeDetails);
			
			$resPromoDealIDs=	$ObjPromocode->listPromoDealIDs($promoID);
			
			if($resPromoCodeDetails['promoStatus']=='Deleted') {
				
				$this->setRedirect("/promocode/");
			}
			
   	 	} else {
			
			$this->setRedirect("/promocode/");
		}
		
		//get all added Deals
		if($resPromoDealIDs!='') {
			
			if($resPromoCodeDetails['promoStatus']=='Used') {
				$dealStatus		=	'';  			  
			} else {
			  
				$dealStatus		=	'Deleted';	
			}
			
			$dealIDs				=	$ObjPromocode->explodeDealIDs($resPromoDealIDs);
			
			$resPromoCodeDealsCount	=	$ObjDeal->listUpcomingDeals($defaultLanguageID,$dealStatus,$dealIDs,'C');
		
			if($resPromoCodeDealsCount > 0) {
				
				list($limitFrom,$limitTo)   =   $this->getPageSettings($key='page',$rows=10);
				$resPromoCodeDeals			=	$ObjDeal->listUpcomingDeals($defaultLanguageID,$dealStatus,$dealIDs,'');
				$resPagesCount		   		=	$this->setPagesCount($key='page');
			
				
			}
		}		
		
		//get default currency
		$resDefaultCurrency			=	$ObjCurrency->getDefaultCurrencyDetails($this->getSettingValue('site_settings','default_currency'));
		$this->ObjView->assign('resDefaultCurrency',$resDefaultCurrency);
  
  		$previousURL =    $this->getPreviousURL();
    	$this->ObjView->assign('previousURL',$previousURL);
    	$this->ObjView->assign('defaultDateFormat', $this->getSettingValue('site_settings','date_format')); 
		$this->ObjView->assign('resPromoCodeDealsCount', $resPromoCodeDealsCount);
		$this->ObjView->assign('resPromoCodeDeals', $resPromoCodeDeals);
    	$this->ObjView->display('PromocodeView.tpl');
      
  }
  
  public function ajaxPromoCodeAction() {
	  
	  $ObjPromocode 	= 	new PromocodeModel();
	  
	  //Auto generate code
	  if($_POST['autoGen']=='Y'){
		
			$generatedCode	=	$ObjPromocode->auoGenerateCode($_POST['codeLen']-1);
			echo $generatedCode;		
			exit;
	  }
		
	  
  }
  public function ajaxListDealsAction() {
	  
	  //initialize object
	  $ObjPromocode 		= 	new PromocodeModel();
	  $ObjDeal				=	new DealModel();
	  $ObjLanguage			=	new LanguageModel();
	  
	  $languageIDs			= 	$ObjLanguage->getLanguageIDs();
		
	  $defaultLanguageID  	=	$languageIDs['Default'];
	  $currentLanguageID  	= 	$languageIDs['Current'];
	  
	  $promoID 				=   $_POST['promoID'];
	  
	  $dealIDs				=	'';
	  
	  if($promoID >0) {
		  
		  if($_POST['promoStatus']=='Used') {
			  	$dealStatus		=	'';  			  
		  } else {
		  
		  		$dealStatus		=	'Deleted';	
		  }
		  
	  } else {
		  
			$dealStatus		=	'Active';  
			
	  }
	  
	  if($_POST['promoEffectOnDeals']!='All') {
		  
		
	  	$dealIDs		=	$ObjPromocode->explodeDealIDs($_POST['selectedPromoDealIDs']);
	  }
	  
	  
	  //To get Active Deals
		$resListUpcomingDeals		=	'';
	
		$resListUpcomingDealsCount	=	$ObjDeal->listUpcomingDeals($defaultLanguageID,$dealStatus,$dealIDs,'C','N');
	
		if($resListUpcomingDealsCount > 0) {
			$resListUpcomingDeals	=	$ObjDeal->listUpcomingDeals($defaultLanguageID,$dealStatus,$dealIDs,'','N');
		}
		
		$resPromoCodeDealsCount		=	0;
		$resPromoCodeDeals			=	'';
		
		if($_POST['selectedPromoDealIDs']!='' && $_POST['promoEffectOnDeals']!='All') {
			
			$resPromoCodeDealsCount		=	$ObjDeal->listUpcomingDeals($defaultLanguageID,$dealStatus,$dealIDs,'C');
			
			if($resPromoCodeDealsCount > 0) {
				$resPromoCodeDeals		=	$ObjDeal->listUpcomingDeals($defaultLanguageID,$dealStatus,$dealIDs,'');
			}
		}
	  $this->ObjView->assign('promoEffectOnDeals', $_POST['promoEffectOnDeals']);
	  $this->ObjView->assign('resListUpcomingDealsCount', $resListUpcomingDealsCount);
	  $this->ObjView->assign('resListUpcomingDeals', $resListUpcomingDeals);
	  $this->ObjView->assign('resPromoCodeDealsCount', $resPromoCodeDealsCount);
	  $this->ObjView->assign('resPromoCodeDeals', $resPromoCodeDeals);
	  $this->ObjView->display('AjaxPromocodeDeals.tpl');
	  
  } 
  
}

?>