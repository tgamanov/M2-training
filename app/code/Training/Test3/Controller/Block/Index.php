<?php

namespace Training\Test3\Controller\Block;


class Index extends \Magento\Framework\App\Action\Action
{
public function execute() //call me with training3/block/index
{
   $layout = $this->_view->getLayout();
   $block = $layout->createBlock('Training\Test3\Block\Test');
   $this->getResponse()->appendBody($block->toHtml());
}
}