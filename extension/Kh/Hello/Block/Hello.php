<?php

namespace Kh\Hello\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Shipping\Model\Config;
use Magento\Store\Model\StoreManagerInterface;

class Hello extends Template
{
    protected $_storeManager;
    protected $scopeConfig;
    protected $shippingConfig;

    public function __construct(
        Template\Context $context,
        StoreManagerInterface $storeManager,
        ScopeConfigInterface $scopeConfig,
        Config $shippingConfig,
        array $data = [])
    {
        $this->scopeConfig = $scopeConfig;
        $this->shippingConfig = $shippingConfig;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getAllCarriers()
    {
        $allCarrier = $this->shippingConfig->getAllCarriers($this->_storeManager->getStore());
        foreach ($allCarrier as $shippingCode=>$shippingModel){
            $shippingTitle = $this->scopeConfig->getValue('carrier/'.$shippingCode.'/title');
        }
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    public function getMediaUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }
}
