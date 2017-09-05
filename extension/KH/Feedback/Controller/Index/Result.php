<?php

namespace KH\Feedback\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Result\PageFactory;

class Result extends Action {

    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $pageFactory) {
        $this->resultPageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute() {
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $feedback = $objectManager->create('KH\Feedback\Model\Feedback');
            $feedback->setData($data);
            $feedback->save();
            $this->messageManager->addSuccess(__('Feedback saved successfully.'));
        } else {
            $this->messageManager->Error(__('Unable to save feedback.'));
        }

        $resultPage = $this->resultPageFactory->create();
        $this->_redirect('feedback/index/index');
        return $resultPage;
    }

}
