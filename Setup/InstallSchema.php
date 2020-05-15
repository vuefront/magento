<?php

namespace Vuefront\Vuefront\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
     public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
     {
         $installer = $setup;
         $installer->startSetup();

        /**
         * Create table 'magefan_faq'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('vuefront_apps')
        )->addColumn(
            'app_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'APP ID'
        )->addColumn(
            'codename',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'APP Codename'
        )->addColumn(
            'jwt',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            ['nullable' => true],
            'APP Jwt'
        )->addColumn(
            'date_added',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'App Date Added'
        )->setComment(
            'Vuefront APP Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
     }
}
