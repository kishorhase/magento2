<?php

namespace Interview\Kishore\Setup;

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
            $setup->getTable('interview_kishore_video'),
            ['title' => 'Magento 2 Beginner Tutorials - 01',
              'url_key' => 'tutorials-01',
              'description' => 'My test video 1 My test video 1 My test video 1 My test video 1',
              'url_link' => 'https://www.youtube.com/embed/DMUjwJrsMBQ'
            ]
        );
        $setup->getConnection()->insert(
            $setup->getTable('interview_kishore_video'),
            ['title' => 'Magento 2 Beginner Tutorials - 02',
              'url_key' => 'tutorials-02',
              'description' => 'My test video 2 My test video 2 My test video 2 My test video 2',
              'url_link' => 'https://www.youtube.com/embed/8kxRGvtgNW4'
            ]
        );
        $setup->endSetup();
    }
}