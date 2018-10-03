<?php

namespace Kh\Mastering\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_ENABLE = 'mastring/general/enable';
    private $config;

    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;

    }

    public function isEnabled()
    {
        $this->config->getValue(self::XML_PATH_ENABLE);
    }
}