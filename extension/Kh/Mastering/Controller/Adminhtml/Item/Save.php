<?php

namespace Kh\Mastering\Controller\Adminhtml\Item;

use Kh\Mastering\Model\ItemFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Save extends Action
{
    protected $itemFactory;

    public function __construct(Action\Context $context, ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $this->itemFactory->create()
            ->setData($this->getRequest()->getParams()['general'])
            ->save();
        $this->messageManager->addSuccess(__('Item added successfully.'));
        return $this->resultRedirectFactory->create()->setPath('mastering/index/index');
    }
}