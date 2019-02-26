<?php

namespace Guri\StoreLocator\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Location extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
   protected function _construct()
    {
        $this->_controller = 'adminhtml_location';
        $this->_blockGroup = 'Guri_StoreLocation';
        $this->_headerText = __('Manage Location');
        $this->_addButtonLabel = __('Add Location');
        parent::_construct();
    }
} 
