<?php

namespace kh\Mastering\Console\Command;

use Kh\Mastering\Model\ItemFactory;
use Magento\Framework\Console\Cli;
use Magento\Framework\Event\ManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddItem extends Command
{
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_DESCRIPTION = 'description';
    private $itemFactory;
    private $eventManager;

    public function __construct(ItemFactory $itemFactory, ManagerInterface $eventManager)
    {
        $this->itemFactory = $itemFactory;
        $this->eventManager = $eventManager;
        parent::__construct();
    }

    /**
     *
     */
    protected function configure()
    {
        $this->setName('mastering:add:item')
            ->addArgument(self::INPUT_KEY_NAME, InputArgument::REQUIRED, 'Item Name')
            ->addArgument(self::INPUT_KEY_DESCRIPTION, InputArgument::OPTIONAL, 'Item Description');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INPUT_KEY_DESCRIPTION));
        $item->setIsObjectNew(true);
        $item->save();
        /*
        $this->eventManager->dispatch('mastering_command',['object'=>$item]);
        */
        return Cli::RETURN_SUCCESS;

    }
}