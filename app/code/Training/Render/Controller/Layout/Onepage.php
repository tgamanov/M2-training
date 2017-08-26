<?php

namespace Training\Render\Controller\Layout;
class Onepage extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $block = $this->_view->getLayout()->createBlock('Magento\Framework\View\Element\Template');
        $block->setTemplate('Training_Render::first.phtml');
        $this->getResponse()->appendBody($block->toHtml());
    }

}