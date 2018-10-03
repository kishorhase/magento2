<?php
namespace Kh\Hello\Setup;

use Kh\Hello\Block\Hello;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class installSchema implements InstallSchemaInterface{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $table = $setup->getConnection()->newTable(
            $setup->getTable('Hello')
        )->addColumn(
            'id',
            null,
            ['identity'=>true,nuable=>false, primary=>true],
            'Item Id'
        )
    }

}