<?php

namespace KH\Feedback\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface {

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.1.0') < 0) {

            // Get module table
            $tableName = $setup->getTable('kh_feedback');

            // Check if the table already exists
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                // Declare data
                $columns = [
                    'email' => [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'nullable' => false,
                        'comment' => 'email',
                    ],
                ];

                $connection = $setup->getConnection();
                foreach ($columns as $name => $definition) {
                    $connection->addColumn($tableName, $name, $definition);
                }
            }
        }

        if (version_compare($context->getVersion(), '1.1.1') < 0) {

            // Get module table
            $tableName = $setup->getTable('kh_feedback');

            // Check if the table already exists
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                // Declare data
                $columns = [
                    'mobile' => [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'nullable' => false,
                        'comment' => 'mobile',
                    ],
                ];

                $connection = $setup->getConnection();
                foreach ($columns as $name => $definition) {
                    $connection->addColumn($tableName, $name, $definition);
                }
            }
        }

        if (version_compare($context->getVersion(), '1.1.2') < 0) {

            if (!$setup->tableExists('kh_feedback_product_attachment_rel')) {
                $table = $setup->getConnection()
                        ->newTable($setup->getTable('kh_feedback_product_attachment_rel'))
                        ->addColumn('feedback_id', Table::TYPE_INTEGER, 10, ['nullable' => false, 'unsigned' => true])
                        ->addColumn('product_id', Table::TYPE_INTEGER, 10, ['nullable' => false, 'unsigned' => true], 'Magento Product Id')
//                        ->addForeignKey(
//                                $setup->getFkName(
//                                        'kh_feedback', 'feedback_id', 'kh_feedback_product_attachment_rel', 'feedback_id'
//                                ), 'feedback_id', $setup->getTable('kh_feedback'), 'feedback_id', Table::ACTION_CASCADE
//                        )
//                        ->addForeignKey(
//                                $setup->getFkName(
//                                        'kh_feedback_product_attachment_rel', 'feedback_id', 'catalog_product_entity', 'entity_id'
//                                ), 'product_id', $setup->getTable('catalog_product_entity'), 'entity_id', Table::ACTION_CASCADE
//                        )
                        ->setComment('Feedback Product Attachment relation table');

                $setup->getConnection()->createTable($table);
            }
        }


        $setup->endSetup();
    }

}
