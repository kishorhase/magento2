<?php

namespace Kh\Mastering\Model\ResourceModel\Item;

use Kh\Mastering\Model\Item;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Item::class, \Kh\Mastering\Model\ResourceModel\Item::class);
    }
}