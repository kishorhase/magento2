<?php

namespace Kh\Hello\Controller\Index;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $customerRepository;

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
        /*
         $this->_view->loadLayout();
         $this->_view->getLayout()->initMessages();
         $this->_view->renderLayout();
        */
    }
}


