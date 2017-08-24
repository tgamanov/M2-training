<?php


namespace Training\Test3\Block\Product\View;


class Description extends \Magento\Framework\View\Element\AbstractBlock
{
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $originalBlock)
    {
//        $originalBlock->getProduct()->setDescription('Test description'); // task 2.3
        $originalBlock->setTemplate('Training_Test3::description.phtml');
    }
}