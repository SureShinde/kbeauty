<?php

class Valkyrie_SliderData_Block_Adminhtml_SliderData_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

  protected function _prepareForm()
  {
    $imagesDir = 'media/'.Valkyrie_SliderData_Adminhtml_SliderDataController::SLIDER_DATA_IMAGES_DIR.'/';
//var_dump(Mage::getSingleton('adminhtml/session'));
    if (Mage::getSingleton('adminhtml/session')->getSliderDataData())
    {
      $data = Mage::getSingleton('adminhtml/session')->getSliderDataData();
      Mage::getSingleton('adminhtml/session')->getSliderDataData(null);
    }
    elseif (Mage::registry('sliderdata'))
    {
      $data = Mage::registry('sliderdata')->getData();
    }
    else
    {
      $data = array();
    }

    $form = new Varien_Data_Form(array(
      'id' => 'edit_form',
      'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
      'method' => 'post',
      'enctype' => 'multipart/form-data',
    ));

    $form->setUseContainer(true);

    $this->setForm($form);

    $fieldset = $form->addFieldset('sliderdata_form', array(
      'legend' =>Mage::helper('sliderdata')->__('Slide Information')
    ));

    $fieldset->addField('title', 'text', array(
      'label'     => Mage::helper('sliderdata')->__('Title'),
      'class'     => 'required-entry',
      'required'  => true,
      'name'      => 'title',
    ));

/*    $fieldset->addField('sub_title', 'text', array(
      'label'     => Mage::helper('sliderdata')->__('Subtitle'),
      'class'     => 'required-entry',
      'required'  => true,
      'name'      => 'sub_title',
    ));

    $fieldset->addField('link_caption', 'text', array(
      'label'     => Mage::helper('sliderdata')->__('Link Caption'),
      'class'     => 'required-entry',
      'required'  => true,
      'name'      => 'link_caption',
    ));*/

    $fieldset->addField('link_href', 'text', array(
      'label'     => Mage::helper('sliderdata')->__('Link Href'),
      'name'      => 'link_href',
    ));

      $fieldset->addField('desktop_image', 'image', array(
          'label' => Mage::helper('sliderdata')->__('Desktop Image'),
          'name' => 'desktop_image',
          'after_element_html' => '<small>'.$imagesDir.'</small>',
      ));

      $fieldset->addField('mobile_image', 'image', array(
          'label' => Mage::helper('sliderdata')->__('Mobile Image'),
          'name' => 'mobile_image',
          'after_element_html' => '<small>'.$imagesDir.'</small>',
      ));

    $fieldset->addField('disclaimers_content', 'textarea', array(
        'label'     => Mage::helper('sliderdata')->__('Disclaimers'),
        'name'      => 'disclaimers_content',
    ));



    $fieldset->addField('sort_order', 'text', array(
      'label'     => Mage::helper('sliderdata')->__('Sort Order'),
      'name'      => 'sort_order',
      'class'     => 'validate-digits',
      'after_element_html' => '<small>Sort order for forms</small>',
    ));

    $fieldset->addField('active', 'select', array(
      'label'     => Mage::helper('sliderdata')->__('Status'),
      'name'      => 'active',
        'values' => array('0' => 'Inactive', '1' => 'Active'),// - See more at: http://excellencemagentoblog.com/blog/2011/11/02/magento-admin-form-field/#sthash.cgXepzMc.dpuf
//      'class'     => 'validate-digits',
//      'after_element_html' => '<small>Sort order for forms</small>',
    )); //->setIsChecked((bool)$data['active']);
//var_dump($data);

//      $data['active'] = "1";


      $fieldset->addField('active_from', 'date', array(
          'label'     => Mage::helper('sliderdata')->__('Date Start'),
          'name'      => 'active_from',
          'class'     => 'validate-date',
          'after_element_html' => '<small>Select Date</small>',
          'image'     => $this->getSkinUrl('images/grid-cal.gif'),

          'format' => "MMM d, y",
      ));
      $fieldset->addField('active_to', 'date', array(
          'label'     => Mage::helper('sliderdata')->__('Date End'),
          'name'      => 'active_to',
          'class'     => 'validate-date',
          'after_element_html' => '<small>Select Date</small>',
          'image'     => $this->getSkinUrl('images/grid-cal.gif'),

          'format' => "MMM d, y",
      ));


    $form->setValues($data);

    return parent::_prepareForm();
  }
}