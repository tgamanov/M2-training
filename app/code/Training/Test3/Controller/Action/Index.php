<?php

namespace Training\Test3\Controller\Action;


class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $block = $this->_view->getLayout()->createBlock('Training\Test3\Block\Template');
        $block->setTemplate('Training_Test3::test.phtml');
        $this->getResponse()->appendBody($block->toHtml());
    }
}