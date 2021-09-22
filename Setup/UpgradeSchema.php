<?php

namespace Vuefront\Vuefront\Setup;

use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $installer = $setup;

        $connection = $installer->getConnection();

        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $table = $setup->getTable('vuefront_apps');
            $connection->addColumn(
                $setup->getTable($table),
                'eventUrl',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' =>  255,
                    'nullable' => true,
                    'comment' => 'Url for events'
                ]
            );
            $connection->addColumn(
                $setup->getTable($table),
                'authUrl',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    ['nullable' => true],
                    'comment' => 'Url for auth'
                ]
            );

            if ($connection->isTableExists('vuefront_settings') == false) {

                /**
                 * Create table 'vuefront_settings'
                 */
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('vuefront_settings')
                )->addColumn(
                    'setting_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true],
                    'SETTING ID'
                )->addColumn(
                    'key',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => true],
                    'SETTING key'
                )->addColumn(
                    'value',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    ['nullable' => true],
                    'SETTING value'
                );
                $installer->getConnection()->createTable($table);
            }
        }

        $installer->endSetup();
    }
}
