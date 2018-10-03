<?php

namespace Kh\Mastering\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()->newTable($setup->getTable('kh_mastering_item'))
            ->addColumn('id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Item Id')
            ->addColumn('name',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Item Name')
            ->addIndex($setup->getIdxName('kh_mastering_item', ['name']), ['name'])
            ->setComment('Sample item');
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}
