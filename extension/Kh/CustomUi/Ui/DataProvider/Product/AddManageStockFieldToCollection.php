<?php

namespace Kh\CustomUi\Ui\DataProvider\Product;

use Magento\Framework\Data\Collection;
use Magento\Ui\DataProvider\AddFieldToCollectionInterface;

class AddManageStockFieldToCollection implements AddFieldToCollectionInterface
{
    public function addField(Collection $collection, $field, $alias = null)
    {
        $collection->joinField(
            'manage_stock',
            'cataloginventory_stock_item',
            'manage_stock',
            'product_id=entity_id',
            null,
            'left'
        );
    }
}