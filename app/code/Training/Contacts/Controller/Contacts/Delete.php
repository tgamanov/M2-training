<?php


namespace Training\Contacts\Controller\Contacts;

use Magento\Backend\App\Action\Context;

class Delete extends \Magento\Backend\App\Action
{

    /**
     * @var \Training\Contacts\Model\ContactsFactory
     */
    protected $contactsFactory;

    /**
     * @param \Training\Contacts\Model\contactsFactory $contactsFactory
     * @param Context $context
     */
    public function __construct(
        \Training\Contacts\Model\contactsFactory $contactsFactory,
        Context $context
    )
    {
        $this->contactsFactory = $contactsFactory;
        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('training_contacts_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->contactsFactory->create();
                $model->getResource()->load($model, $id);
                $model->getResource()->delete($model);
                // display success message
                $this->messageManager->addSuccess(__('You deleted the contacts.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['training_contacts_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a contacts to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
