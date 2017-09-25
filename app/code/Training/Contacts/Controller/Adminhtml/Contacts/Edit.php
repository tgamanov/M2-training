<?php


namespace Training\Contacts\Controller\Contacts;

use Magento\Backend\App\Action;

class Edit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Training_Contacts::save';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Training\Contacts\Model\ContactsFactory
     */

    protected $contactsFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
    \Training\Contacts\Model\ContactsFactory $contactsFactory

    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->contactsFactory = $contactsFactory;
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Training_Contacts::contacts_contacts')
            ->addBreadcrumb(__('Contacts'), __('Contacts'))
            ->addBreadcrumb(__('Manage Contacts'), __('Manage Contacts'));
        return $resultPage;
    }

    /**
     * Edit Contacts
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('training_contacts_id');
        $model = $this->contactsFactory->create();

        // 2. Initial checking
        if ($id) {
            $model->getResource()->load($model, $id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This Contacts no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Contacts') : __('New Contacts'),
            $id ? __('Edit Contacts') : __('New Contacts')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Contacts'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Contacts'));

        return $resultPage;
    }
}
