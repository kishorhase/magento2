<?php


namespace Interview\Kishore\Model\ResourceModel\Video;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Interview\Kishore\Model\Video::class,
            \Interview\Kishore\Model\ResourceModel\Video::class
        );
    }
}
