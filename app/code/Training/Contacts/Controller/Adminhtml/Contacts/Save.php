<?php


namespace Training\Contacts\Controller\Adminhtml\Contacts;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Training_Contacts::contacts_save';

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var \Training\Contacts\Model\ContactsFactory
     */

    public function __construct(
        \Training\Contacts\Model\ContactsFactory $contactsFactory,
        Context $context,
        DataPersistorInterface $dataPersistor
    )
    {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getContactsValue();
        if ($data) {
            $id = $this->getRequest()->getParam('contacts_id');

            if (isset($data['status']) && $data['status'] === 'true') {
                $data['status'] = \Training\Contacts\Model\Contacts::STATUS_ENABLED;
            }
            if (empty($data['training_contacts_id'])) {
                $data['training_contacts_id'] = null;
            }

            $model = $this->contactsFactory->create();
            $model->getResource()->load($model, $id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This contacts no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
                $model->getResource()->save($model);
                $this->messageManager->addSuccess(__('You saved the contacts.'));
                $this->dataPersistor->clear('contacts');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['training_contacts_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the contacts.'));
            }

            $this->dataPersistor->set('contacts', $data);
            return $resultRedirect->setPath('*/*/edit', ['training_contacts_id' => $this->getRequest()->getParam('training_contacts_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
