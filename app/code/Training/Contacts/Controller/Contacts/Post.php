<?php

namespace Training\Contacts\Controller\Contacts;

class Post extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {

    }

    /**
     * @param \Magento\Contact\Controller\Index\Post $subject
     */

    public function afterexecute(\Magento\Contact\Controller\Index\Post $subject)
    {
        $model = $this->_objectManager->create('Training\Contacts\Model\Contacts');
        $model->setData('training_contacts_name', $_POST['name'])
            ->setData('training_contacts_email', $_POST['email'])
            ->setData('training_contacts_phone_number', $_POST['telephone'])
            ->setData('training_contacts_message', $_POST['comment'])
            ->save();//TODO replace with not deprecated method

    }

}