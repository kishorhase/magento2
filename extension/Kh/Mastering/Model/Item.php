<?php

namespace Kh\Mastering\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected $_eventPrefix = 'mastering_add_item';

    protected function _construct()
    {
        $this->_init(\Kh\Mastering\Model\ResourceModel\Item::class);
    }

}