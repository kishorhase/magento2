<?php

namespace Kh\Mastering\Model;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class DebugHandler extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/debug_custom.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}
