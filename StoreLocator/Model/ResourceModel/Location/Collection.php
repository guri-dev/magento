<?php
namespace Guri\StoreLocator\Model\ResourceModel\Location;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'location_id';
	protected $_eventPrefix = 'guri_storelocator_location_collection';
	protected $_eventObject = 'location_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Guri\StoreLocator\Model\Location', 'Guri\StoreLocator\Model\ResourceModel\Location');
	}

}

