<?php

namespace Kh\Mastering\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class NewAction extends Action {
	public function execute() {
		/*
		$result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
		$result->setHeader('Content-Type', 'text/html');
		$result->setContents('Hello Admin New');
		return $result;
		*/
		return $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
	}
}