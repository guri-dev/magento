<?php

namespace Guri\StoreLocator\Controller\Adminhtml\Location;
use Guri\StoreLocator\Model\LocationFactory;

class Save extends \Magento\Backend\App\Action
{	
    protected $_dataLocation;

	public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Guri\StoreLocator\Model\LocationFactory  $Location
	)
	{
        parent::__construct($context);
        $this->_dataLocation = $Location;
	}

	public function execute()
	{
        $model = $this->_dataLocation->create();
		$general = $this->getRequest()->getParam('general');
		$location_on_map = $this->getRequest()->getParam('location_on_map');
		$store_attribute = $this->getRequest()->getParam('store_attribute');
		$model->addData([
			"location_name" => $general['location_name'],
			"location_state" => $general['location_state'],
			"location_city" => $general['location_city'],
			"location_zip" => $general['location_zip'],
			"location_address" => $general['location_address'],
			"location_phone" => $general['location_phone'],
			"location_email" => $general['location_email'],
			"location_website" => $general['location_website'],
			"location_position" => $general['location_position'],
			"location_description" => $general['location_description'],
			"location_country" => $general['location_country'],
			"location_status" => $general['location_status'],
			"location_show_shedule" => $general['location_show_shedule'],
			"location_latitude" => $location_on_map['location_latitude'],
			"location_longitude" => $location_on_map['location_longitude'],
			"location_parking_availability" => $store_attribute['location_parking_availability'],
			"location_atm" => $store_attribute['location_atm'],
			"location_payment_methods" => $store_attribute['location_payment_methods'],
			]);
        $saveData = $model->save();
        if($saveData){
            $this->messageManager->addSuccess( __('Insert Record Successfully !') );
		}
		$this->_redirect('guri_storelocator/location/index');
		
        
	}


}
