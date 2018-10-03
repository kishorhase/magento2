<?php

namespace Kh\Mastering\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'kh_mastering_item',
            'id'
        );
    }
}