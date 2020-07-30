<?php

namespace EduardCherkashyn\OverdoseAdvancedReview\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

Class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $reviewTable = 'review_detail';

        $setup->getConnection()
            ->addColumn(
                $setup->getTable($reviewTable),
                'pros',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' =>'Pros'
                ]);
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($reviewTable),
                'cons',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' =>'Cons'
                ]);
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($reviewTable),
                'helpful',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'nullable' => true,
                    'comment' =>'Was this review helpful'
                ])
            ;
        $setup->endSetup();
    }
}

