<?php

class Dotdigitalgroup_Email_Block_Adminhtml_Automation_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup = 'ddg_automation';
        $this->_controller = 'adminhtml_automation';
        $this->_updateButton('delete', 'label', Mage::helper('ddg')->__('Delete Contact'));
        $this->_addButton('saveandcontinue', array(
            'label'        => Mage::helper('ddg')->__('Save And Continue Edit'),
            'onclick'    => 'saveAndContinueEdit()',
            'class'        => 'save',
        ), -100);
        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
	 * HEader text.
	 * @return string
	 */
    public function getHeaderText()
    {
        if ( Mage::registry('automation_data') && Mage::registry('contact_data')->getId() ) {
            return Mage::helper('ddg')->__("Edit Automation '%s'", $this->htmlEscape(Mage::registry('contact_data')->getContact()));
        } else {
            return Mage::helper('ddg')->__('Add Automation');
        }
    }
}