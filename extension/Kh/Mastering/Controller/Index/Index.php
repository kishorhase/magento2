<?php

namespace Kh\Mastering\Controller\Index;

use Magento\Framework\App\Action\Action;


class Index extends Action
{
    public function execute()
    {
        /*
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setHeader('Content-Type', 'text/html');
        $result->setContents('Hello frontend');
        return $result;
        */
        return $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
    }
}