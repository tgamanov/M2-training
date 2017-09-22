<?php

namespace Training\Contacts\Model\ResourceModel\Contacts;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'training_contacts_id';

    /**
     * Define resource model
     *
     * @return void
     */

    protected function _construct()
    {
        $this->_init('Training\Contacts\Model\Contacts', 'Training\Contacts\Model\ResourceModel\Contacts');
    }

}