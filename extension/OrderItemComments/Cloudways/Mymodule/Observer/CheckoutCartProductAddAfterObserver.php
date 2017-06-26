<?php

namespace Cloudways\Mymodule\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;

class CheckoutCartProductAddAfterObserver implements ObserverInterface
{

    protected $_request;

    /**
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request){
            $this->_request = $request;
    }

    /**
     * @param EventObserver $observer
     * @return void
     */
    public function execute(EventObserver $observer)
    {
        /* @var \Magento\Quote\Model\Quote\Item $item */
        $item = $observer->getQuoteItem();
        

        $additionalOptions = array();

        if ($additionalOption = $item->getOptionByCode('additional_options')){
            $additionalOptions = (array) unserialize($additionalOption->getValue());
        }

        $post = $this->_request->getParam('cloudways');

        if(is_array($post)){
            foreach($post as $key => $value){
                if($key == '' || $value == ''){
                    continue;
                }

                $additionalOptions[] = array(
                    'label' => $key,
                    'value' => $value
                );
            }
        }

        if(count($additionalOptions) > 0){
            $item->addOption(array(
                'product_id' => $item->getProductId(),
                'code' => 'additional_options',
                'value' => serialize($additionalOptions)
            ));
        }


        /* To Do */

        // Edit Cart - May need to remove option and readd them
        // Pre-fill remarks on product edit pages


        /* Issues */

        // Create new cart item with identical option values will add a new line item, instead of increment previous item qty

    }
}
