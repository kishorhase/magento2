<?php

namespace Kh\ProductAttribute\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Options extends AbstractSource
{

    public function getOptionText($value)
    {
        foreach ($this->getAllOptions() as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return false;
    }

    public function getAllOptions()
    {
        $this->_options = [
            ['label' => '', 'value' => ''],
            ['label' => 'Small', 'value' => '1'],
            ['label' => 'Medium', 'value' => '2'],
            ['label' => 'Large', 'value' => '3']
        ];
        return $this->_options;
    }
}