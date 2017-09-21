<?php

namespace Training\Contacts\Model\ResourceModel;

class Contacts extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('training_contacts', 'training_contacts_id');
    }

}