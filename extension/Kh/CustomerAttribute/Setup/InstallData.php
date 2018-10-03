<?php

namespace Kh\CustomerAttribute\Setup;

use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use \Magento\Customer\Model\Customer;
use Magento\Framework\Setup\{
    ModuleContextInterface,
    ModuleDataSetupInterface,
    InstallDataInterface
};


class InstallData implements InstallDataInterface
{

    private $customerSetupFactory;
    private $attributSetFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory, AttributeSetFactory $attributeSetFactory)
    {
        $this->attributSetFactory = $attributeSetFactory;
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        $attributeSet = $this->attributSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'custom_customer_attribute',
            [
                'type' => 'varchar',
                'label' => 'Custom Customer Attribute',
                'input' => 'text',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'system' => 0,
            ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY,'custom_customer_attribute')
            ->addData(['attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_form' => ['adminhtml_customer', 'customer_account_create', 'customer_account_edit'],]);
        $attribute->save();
    }
}
