<?php

namespace Kh\Mastering\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {
       /*
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setHeader('Content-Type', 'text/html');
        $result->setContents('Hello Admin');
        return $result;
       */
       return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}