<?php

class Dotdigitalgroup_Email_Adminhtml_Email_CatalogController extends Mage_Adminhtml_Controller_Action
{
    /**
     * main page.
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('email_connector');
        $this->_addContent($this->getLayout()->createBlock('ddg_automation/adminhtml_catalog'));
        $this->getLayout()->getBlock('head')->setTitle('Connector Catalog');
        $this->renderLayout();
    }

    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('email_connector/reports/email_connector_catalog');
    }
}
