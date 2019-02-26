<?php

namespace Guri\StoreLocator\Controller\Adminhtml\Location;

use Guri\StoreLocator\Controller\Adminhtml\Location;

class Delete extends \Magento\Backend\App\Action
{
   /**
    * @return void
    */
   public function execute()
   {
      $newsId = (int) $this->getRequest()->getParam('location_id');

      if ($newsId) {
         /** @var $newsModel \Mageworld\SimpleNews\Model\News */
         $newsModel = $this->_locationFactory->create();
         $newsModel->load($newsId);

         // Check this news exists or not
         if (!$newsModel->getId()) {
            $this->messageManager->addError(__('This location no longer exists.'));
         } else {
               try {
                  // Delete news
                  $newsModel->delete();
                  $this->messageManager->addSuccess(__('The location has been deleted.'));

                  // Redirect to grid page
                  $this->_redirect('*/*/');
                  return;
               } catch (\Exception $e) {
                   $this->messageManager->addError($e->getMessage());
                   $this->_redirect('*/*/edit', ['location_id' => $newsModel->getId()]);
               }
            }
      }
   }
}
 
