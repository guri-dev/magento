<?php

namespace Guri\StoreLocator\Controller\Adminhtml\Location;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
        try{
			$resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->prepend((__('Location')));
            return $resultPage; 
        } catch(Exception $e)
        {
            print_r($e); exit;
        }
		
	}


}
