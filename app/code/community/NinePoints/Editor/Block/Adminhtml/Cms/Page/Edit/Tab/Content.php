<?php
/**
 * Created by NinePoints Co., LTD
 * User: ndlinh
 * Date:
 *
 * Copyright © NinePoints Co., LTD. All Rights Reserved.
 */
class NinePoints_Editor_Block_Adminhtml_Cms_Page_Edit_Tab_Content extends Mage_Adminhtml_Block_Cms_Page_Edit_Tab_Content
{
    protected function _prepareForm()
    {
        // Execute Magento logic:
        parent::_prepareForm();

        // Reset the "content" field
        $fieldset = $this->getForm()->getElement('content_fieldset');

        $contentValue = $this->getForm()->getElement('content')->getValue();
        $editorDisabled = $this->getForm()->getElement('content')->getData('disabled');
        $editorConfig = $this->getForm()->getElement('content')->getData('config');
        $fieldset->removeField('content');

        $fieldset->addType('ckeditor', Mage::getConfig()->getBlockClassName('npeditor/adminhtml_form_element_ckeditor'));

        $fieldset->addField('content', 'ckeditor', array(
            'name'      => 'content',
            'style'     => 'height:36em;',
            'required'  => true,
            'disabled'  => $editorDisabled,
            'config'    => $editorConfig,
            'value' => $contentValue,
        ));

        return $this;
    }
}