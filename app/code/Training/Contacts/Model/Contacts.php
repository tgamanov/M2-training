<?php

namespace Training\Contacts\Model;

/**
 * @method \Training\Contacts\Model\ResourceModel\Contacts getResource()
 * @method \Training\Contacts\Model\ResourceModel\Contacts\Collection getCollection()
 */
class Contacts extends \Magento\Framework\Model\AbstractModel implements \Training\Contacts\Api\Data\ContactsInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'training_contacts_contacts';
    protected $_cacheTag = 'training_contacts_contacts';
    protected $_eventPrefix = 'training_contacts_contacts';

    protected function _construct()
    {
        $this->_init('Training\Contacts\Model\ResourceModel\Contacts');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}