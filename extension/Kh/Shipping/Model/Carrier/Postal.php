<?php

namespace kh\Shipping\Model\Carrier;

use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;

class Postal extends AbstractCarrier implements CarrierInterface
{

    protected $_code = 'postal';

    protected $resultFactory;

    protected $methodFactory;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $resultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $methodFactory,

        array $data = []
    )
    {
        $this->resultFactory = $resultFactory;
        $this->methodFactory = $methodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    public function getAllowedMethods()
    {
        return [$this->getCarrierCode() => $this->getConfigData('name')];
    }

    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigData('active')) {
            return false;
        }
        $result = $this->resultFactory->create();

        $method = $this->methodFactory->create();

        $method->setCarrier($this->getCarrierCode());
        $method->setCarrierTitle($this->getConfigData('title'));

        $method->setMethod($this->getCarrierCode());
        $method->setMethodTitle($this->getConfigData('name'));

        /*you can fetch shipping price from different sources over some APIs, we used price from config.xml - xml node price*/
        $amount = $this->getConfigData('price');

        $method->setPrice($amount);
        $method->setCost($amount);

        $result->append($method);

        return $result;

    }
}