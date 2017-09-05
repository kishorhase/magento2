<?php

namespace KH\Feedback\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface {

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0) {

            $installer->run('create table kh_feedback(feedback_id int not null auto_increment, name varchar(100), 
content varchar(100), 
primary key(feedback_id))');
            $installer->run('insert into kh_feedback values(null,\'Feeback 1\', \'This is test feedback 1\')');
            $installer->run('insert into kh_feedback values(null,\'Feedback 2\', \'This is test feedback 2\')');
        }

        $installer->endSetup();
    }

}
