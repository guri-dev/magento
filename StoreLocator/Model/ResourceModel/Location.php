<?php
namespace Guri\StoreLocator\Model\ResourceModel;


class Location extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('guri_storelocator_location', 'location_id');
	}
	
}
