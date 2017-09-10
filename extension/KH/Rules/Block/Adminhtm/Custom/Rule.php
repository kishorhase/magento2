<?php

namespace KH\Rules\Block\Adminhtml\Custom;

class Rule extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'custom_rule';
        $this->_headerText = __('Custom Rules');
        $this->_addButtonLabel = __('Add New Rule');
        parent::_construct();
    }
}