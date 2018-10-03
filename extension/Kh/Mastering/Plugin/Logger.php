<?php

namespace Kh\Mastering\Plugin;

use kh\Mastering\Console\Command\AddItem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Logger
{
    private $output;

    public function beforeRun(AddItem $command, InputInterface $input, OutputInterface $output)
    {
        $output->writeln('B run message');
    }
}