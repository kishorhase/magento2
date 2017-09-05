<?php
namespace KH\Feedback\Model;

class Feedback extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('KH\Feedback\Model\ResourceModel\Feedback');
    }
}
?>