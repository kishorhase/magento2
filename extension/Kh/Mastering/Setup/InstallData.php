<?php

namespace Kh\Mastering\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $setup->getConnection()->insert(
            $setup->getTable('kh_mastering_item'),
            ['name' => 'Item1']
        );
        $setup->getConnection()->insert(
            $setup->getTable('kh_mastering_item'),
            ['name' => 'Item2']
        );
        $setup->endSetup();
    }
}