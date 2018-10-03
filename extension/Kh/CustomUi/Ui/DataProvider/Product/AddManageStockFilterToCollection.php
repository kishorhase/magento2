<?php

namespace Kh\CustomUi\Ui\DataProvider\Product;

use Magento\Framework\Data\Collection;
use Magento\Ui\DataProvider\AddFilterToCollectionInterface;

class AddManageStockFilterToCollection implements AddFilterToCollectionInterface
{
    public function addFilter(Collection $collection, $field, $condition = null)
    {
        if (isset($condition['eq'])) {
            $collection->addFieldToFilter($field, $condition);
        }
    }
}