<?php

namespace Kh\Mastering\Block;

use Kh\Mastering\Model\ResourceModel\Item\CollectionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Hello extends Template
{
    private $collectionFactory;

    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getItems()
    {
        return $this->collectionFactory->create()->getItems();

    }
}