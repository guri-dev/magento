<?php
namespace Guri\StoreLocator\Controller\Index;
use Guri\StoreLocator\Model\LocationFactory;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_modelLocationFactory;

	
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		LocationFactory $modelLocationFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_modelLocationFactory = $modelLocationFactory;
		return parent::__construct($context);
	}

	public function execute()
	{   
		$post = $this->getRequest()->getPostValue();
		if(isset($post['ajax_filter']) && $post['ajax_filter'] == 'storelocations')
		{
			$locationModel = $this->_modelLocationFactory->create();
			$flag = false;		
			if($post['parking_availability'] == '0' || $post['parking_availability'] == '1')
			{
				$flag = true;
				$locationList = $locationModel->getCollection()
							->addFieldToFilter('location_parking_availability', $post['parking_availability']);
			}
			if($post['atm'] == '0' || $post['atm'] == '1')
			{
				$flag = true;
				$locationList = $locationModel->getCollection()
							->addFieldToFilter('location_atm', $post['atm']);
			}
			if(!empty($post['payment_method']))
			{
				$flag = true;
				$locationList = $locationModel->getCollection()
							->addFieldToFilter('location_payment_methods', array_values($post['payment_method']));
			}
			
			if($flag == false)
			{
				$locationList = $locationModel->getCollection();
				$data  = $locationList->getData();
				echo json_encode($data); exit;
			}

			$data  = $locationList->getData();
			echo json_encode($data); exit;
		} // if ajax call ends
		

		return $this->_pageFactory->create();
	}
		
}
