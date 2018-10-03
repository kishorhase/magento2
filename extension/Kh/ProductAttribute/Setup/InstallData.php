<?php

namespace Kh\ProductAttribute\Setup;
use Magento\Catalog\Model\Category;
use Magento\Framework\Setup\{
    ModuleContextInterface,
    ModuleDataSetupInterface,
    InstallDataInterface
};

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        /**
         * Text box attribute
         */
        /**
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'custom_attribute',
            [
                'group' => 'Custom Attribute Group',
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Sample Attribute',
                'input' => 'text',
                'note' => 'Sample Attribute',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'simple'
            ]
        );
         */

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'custom_size',
            [
                'group' => 'Custom Attribute Group',
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Custom Size',
                'input' => 'select',
                'note' => 'Custom Size',
                'class' => '',
                'source' => 'Kh\ProductAttribute\Model\Config\Source\Options',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '0',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'option' => [
                    'values' => [],
                ]
            ]
        );

    }
}
