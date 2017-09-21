<?php

namespace Training\Contacts\Controller\Index;

class Post extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {

    }

    public function afterexecute(\Magento\Contact\Controller\Index\Post $subject)
    {
    /*    var_dump($_POST);
        exit();*/

        $model = $this->_objectManager->create('Training\Contacts\Model\Contacts');
        $model->setData('training_contacts_name', $_POST['name'])
            ->setData('training_contacts_email',$_POST['email'])
            ->setData('training_contacts_phone_number',$_POST['telephone'])
            ->setData('training_contacts_message',$_POST['comment'])

            ->save();

    }

}