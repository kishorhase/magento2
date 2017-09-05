<?php
namespace KH\Feedback\Block\Adminhtml\Feedback\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('feedback_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Feedback Information'));
    }
}