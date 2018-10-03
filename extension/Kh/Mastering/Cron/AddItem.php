<?php

namespace Kh\Mastering\Model\Cron;

use Kh\Mastering\Model\Config;
use Kh\Mastering\Model\ItemFactory;

class AddItem
{
    private $itemFactory;
    private $config;

    public function __construct(ItemFactory $itemFactory, Config $config)
    {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    public function execute()
    {
        if ($this->config->isEnabled()) {
            $this->itemFactory->create()
                ->setName('Item Cron')
                ->setDescription('Item Cron Description')
                ->save();
        }

    }
}