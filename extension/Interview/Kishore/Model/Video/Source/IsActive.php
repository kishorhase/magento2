<?php
namespace Interview\Kishore\Model\Video\Source;

class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
   
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => 'Disable', 'value' => 0];
        $options[] = ['label' => 'Enable', 'value' => 1];
        return $options;
    }
}
