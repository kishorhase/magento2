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
    
    public function getProducts(\KH\Feedback\Model\Feedback $object)
    {
        $tbl = $this->getResource()->getTable(\KH\Feedback\Model\ResourceModel\Feedback::TBL_ATT_PRODUCT);
        $select = $this->getResource()->getConnection()->select()->from(
            $tbl,
            ['product_id']
        )
        ->where(
            'feedback_id = ?',
            (int)$object->getId()
        );
        return $this->getResource()->getConnection()->fetchCol($select);
    }
}
?>