<?php

namespace Training\ComputerGames\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     *
     *
     * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     * @return void
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $installer = $setup;
        $installer->startSetup();


        $tableName = 'training_computer_game';
        if (!$installer->tableExists($tableName)) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable($tableName)
            )
                ->addColumn(
                    'game_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true],
                    'Block ID'
                )->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Name'
                )->addColumn(
                    'type',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Type'
                )->addColumn(
                    'trial_period',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    [],
                    'Trial Period'
                )->addColumn(
                    'release_date',
                    \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
                    null,
                    ['nullable' => true],
                    'Release Date'
                )->setComment(
                    'Computer games table'
                );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }
    }
}