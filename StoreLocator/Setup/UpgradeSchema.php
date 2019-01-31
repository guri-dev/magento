<?php
namespace Guri\StoreLocator\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.1.0', '<')) {
			if (!$installer->tableExists('guri_storelocator_location')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('guri_storelocator_location')
				)
					->addColumn(
                        'location_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary'  => true,
                            'unsigned' => true,
                        ],
                        'Location ID'
                    )
                    ->addColumn(
                        'location_name',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable => false'],
                        'Location Name'
                    )
                    ->addColumn(
                        'location_country',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location Country'
                    )
                    ->addColumn(
                        'location_state',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location State'
                    )
                    ->addColumn(
                        'location_city',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location City'
                    )
                    ->addColumn(
                        'location_description',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location Description'
                    )
                    ->addColumn(
                        'location_zip',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location Zip'
                    )
                    ->addColumn(
                        'location_address',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location Address'
                    )
                    ->addColumn(
                        'location_phone',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location Phone'
                    )
                    ->addColumn(
                        'location_email',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location Email'
                    )
                    ->addColumn(
                        'location_website',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location Website'
                    )
                    ->addColumn(
                        'location_status',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        1,
                        [],
                        'Status'
                    )
                    ->addColumn(
                        'location_show_shedule',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        10,
                        [],
                        'Location show schedule'
                    )
                    ->addColumn(
                        'location_position',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        [],
                        'Position'
                    )
                    ->addColumn(
                        'location_latitude',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        [],
                        'Latitude'
                    )
                    ->addColumn(
                        'location_longitude',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        [],
                        'Longitude'
                    )
                    ->addColumn(
                        'location_parking_availability',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '10',
                        [],
                        'Parking Available'
                    )
                    ->addColumn(
                        'location_atm',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '10',
                        [],
                        'ATM'
                    )
                    ->addColumn(
                        'location_payment_methods',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '10',
                        [],
                        'Payment Methods'
                    )
                    ->addColumn(
                        'location_image',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Location Image'
                    )
                    ->addColumn(
                        'created_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                        'Created At'
                    )->addColumn(
                        'updated_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                        'Updated At')
                    ->setComment('Location Table');
                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable('guri_storelocator_location'),
                    $setup->getIdxName(
                        $installer->getTable('guri_storelocator_location'),
                        ['location_name','location_city','location_description','location_image'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['location_name','location_city','location_description','location_image'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
			}
		}

		$installer->endSetup();
	}
}
