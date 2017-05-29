<?php
/**
 * Created by NinePoints Co., LTD
 * User: ndlinh
 * Date: 
 *
 * Copyright © NinePoints Co., LTD. All Rights Reserved.
 */
class NinePoints_Editor_Block_Adminhtml_Cms_Block_Edit_Form extends Mage_Adminhtml_Block_Cms_Block_Edit_Form
{
    protected function _prepareForm()
    {
        // Execute Magento logic:
        parent::_prepareForm();

        // Reset the "content" field
        $fieldset = $this->getForm()->getElement('base_fieldset');

        $contentValue = $this->getForm()->getElement('content')->getValue();
        $fieldset->removeField('content');

        $fieldset->addType('ckeditor', Mage::getConfig()->getBlockClassName('npeditor/adminhtml_form_element_ckeditor'));

        $fieldset->addField('content', 'ckeditor', array(
            'name' => 'content',
            'label' => Mage::helper('cms')->__('Content'),
            'title' => Mage::helper('cms')->__('Content'),
            'style' => 'height:36em',
            'required' => true,
            'config' => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
            'value' => $contentValue,
        ));

        return $this;
    }
}