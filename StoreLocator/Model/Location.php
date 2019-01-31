<?php
namespace Guri\StoreLocator\Model;
class Location extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'guri_storelocator_location';

	protected $_cacheTag = 'guri_storelocator_location';

	protected $_eventPrefix = 'guri_storelocator_location';

	protected function _construct()
	{
		$this->_init('Guri\StoreLocator\Model\ResourceModel\Location');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
