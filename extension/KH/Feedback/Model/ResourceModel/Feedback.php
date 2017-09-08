<?php
namespace KH\Feedback\Model\ResourceModel;

class Feedback extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    const TBL_ATT_PRODUCT = 'kh_feedback_product_attachment_rel';
    
    protected function _construct()
    {
        $this->_init('kh_feedback', 'feedback_id');
    }
}
?>