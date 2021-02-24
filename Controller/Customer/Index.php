<?php

namespace Hoekstra\CustomerPrevious\Controller\Customer;

use Magento\Framework\App\RequestInterface;

class Index extends \Magento\Framework\App\Action\Action {

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context
    ) {

        parent::__construct($context);
    }

    public function execute() {
        $this->_view->loadLayout();

        $this->_view->getPage()->getConfig()->getTitle()->set(__('My Downloadable Products'));
        $this->_view->renderLayout();
    }
}
