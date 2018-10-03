<?php
namespace Kh\CustomWidget\Model\Config\Source;
 
class Gender implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
        ['value' => 'mal', 'label' => __('Male')],
        ['value' => 'female', 'label' => __('Female')]];
    }
}