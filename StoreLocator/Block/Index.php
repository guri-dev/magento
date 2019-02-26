<?php
namespace Guri\StoreLocator\Block;
use Magento\Framework\ObjectManagerInterface;
use Guri\StoreLocator\Model\LocationFactory;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_modelLocationFactory;
    public function __construct
                (
					\Magento\Framework\View\Element\Template\Context $context,
					LocationFactory $modelLocationFactory
                )
	{
		$this->_modelLocationFactory = $modelLocationFactory;
		parent::__construct($context);
	}
	
	public function listLocations()
	{
				
		$locationModel = $this->_modelLocationFactory->create();
		// $postCollection = $locationModel->getCollection()
		// 				 ->addFieldToFilter('location_id', 11);
		
		// default show all locations
		$locationList = $locationModel->getCollection();
		return $locationList->getData();
	}
	
}
