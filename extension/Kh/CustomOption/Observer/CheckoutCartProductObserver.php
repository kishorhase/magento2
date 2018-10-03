<?php

namespace Kh\CustomOption\Observer;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CheckoutCartProductObserver implements ObserverInterface
{
    protected $request;

    function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    public function execute(Observer $observer)
    {
        $item = $observer->getQuoteItem();
        $additionalOptions = [];
        if ($additionalOption = $item->getOptionByCode('additional_options')) {
            $additionalOptions = (array)unserialize($additionalOption->getValue());
        }
        $post = $this->request->getParam('kh');
        if (is_array($post)) {
            foreach ($post as $key => $value) {
                if ($key == '' || $value == '')
                    continue;
                $additionalOptions[] = [
                    'label' => $key,
                    'value' => $value
                ];
            }
        }

        if (count($additionalOptions) > 0) {
            $item->addOption([
                'code' => 'additional_options',
                'value' => serialize($additionalOptions)
            ]);
        }

    }
}