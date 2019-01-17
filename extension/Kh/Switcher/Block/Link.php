<?php
namespace Kh\Switcher\Block;

class Link extends \Magento\Framework\View\Element\Html\Link{

    protected function _toHtml()    {
        if (false != $this->getTemplate()) {
            return parent::_toHtml();
        }
        $currentStoreName = $this->_storeManager->getStore()->getName();
        return '<li><a href="#" id="switch-modal" data-mage-init=\'{"custom-popup-modal": {"target": "#switcher-modal-content"}}\'>Store - '.$currentStoreName.'</a></li>';
    }

}
