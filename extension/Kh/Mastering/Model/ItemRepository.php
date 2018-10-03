<?php

namespace Kh\Mastering\Model;

use Kh\Mastering\Api\ItemRepositoryInterface;
use Kh\Mastering\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface
{
    private $collctionFactory;

    function __construct(CollectionFactory $collectionFactory)
    {
        $this->collctionFactory = $collectionFactory;
    }

    public function getList()
    {
        return $this->collctionFactory->create()->getItems();
    }
}