<?php

$path = Mage::getBaseDir('app').DS.'code'.DS.'community'.DS;
$file = 'IWD/Opc/controllers/IndexController.php';
if(file_exists($path.$file)) // load IWD OPC class
{
	require_once 'IWD/Opc/controllers/IndexController.php';
	class IWD_AddressVerification_IndexController extends IWD_Opc_IndexController
	{
	    public function getVerification()
	    {
	        return Mage::getSingleton('addressverification/verification');
	    }
	
		public function indexAction()
		{
			$this->getVerification()->getCheckout()->setShowValidationResults(false);
	
			// set results mode (need for javascript logic)
			$this->getVerification()->getCheckout()->setValidationResultsMode(false);

	    	// clear verification results from prevous checkout
			$this->getVerification()->getCheckout()->setShippingWasValidated(false);
			$this->getVerification()->getCheckout()->setBillingWasValidated(false);
			$this->getVerification()->getCheckout()->setSaveShippingWasValidated(false);
			$this->getVerification()->getCheckout()->setSaveBillingWasValidated(false);
	
			$this->getVerification()->getCheckout()->setBillingValidationResults(false);
			$this->getVerification()->getCheckout()->setShippingValidationResults(false);
			
			parent::indexAction();
		}    
	}
}
else 
{
	// check AheadWorks OneStepCheckout
	$file = Mage::getBaseDir('code').DS.'local'.DS.'AW'.DS.'Onestepcheckout'.DS.'controllers'.DS.'IndexController.php';
	if(file_exists($file)){
		if(!class_exists('AW_Onestepcheckout_IndexController', false))
			include_once($file);
		class IWD_AddressVerification_IndexController extends AW_Onestepcheckout_IndexController{
			
			public function getVerification()
			{
				return Mage::getSingleton('addressverification/verification');
			}
			
			public function indexAction()
			{
				$this->getVerification()->getCheckout()->setShowValidationResults(false);
			
				// set results mode (need for javascript logic)
				$this->getVerification()->getCheckout()->setValidationResultsMode(false);

				// clear verification results from prevous checkout
				$this->getVerification()->getCheckout()->setShippingWasValidated(false);
				$this->getVerification()->getCheckout()->setBillingWasValidated(false);
				$this->getVerification()->getCheckout()->setSaveShippingWasValidated(false);
				$this->getVerification()->getCheckout()->setSaveBillingWasValidated(false);
			
				$this->getVerification()->getCheckout()->setBillingValidationResults(false);
				$this->getVerification()->getCheckout()->setShippingValidationResults(false);
			
				parent::indexAction();
			}
		}
	}
	else{ // load standard class
		
		require_once 'Mage/Checkout/controllers/IndexController.php';
		class IWD_AddressVerification_IndexController extends Mage_Checkout_IndexController
		{
		}
	}
}