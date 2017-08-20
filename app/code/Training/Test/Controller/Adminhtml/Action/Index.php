<?php
/**
 *
 */
namespace Training\Test\Controller\Adminhtml\Action;
class Index extends \Magento\Backend\App\Action
{
    /**
     * Test action index
     */
    public function execute()
    {
        $this->_redirect('catalog/category/view/id/3');
    }
    /**
     * Check if admin has permissions to visit related pages
     * @return boolean
     */
    protected function _isAllowed()
    {
        $secret = $this->getRequest()->getParam('secret');
        return isset($secret) && (int)$secret==1;
    }
}