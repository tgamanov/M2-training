<?php

namespace Training\Contacts\Model;

use Training\Contacts\Api\Data\ContactsInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * @method \Training\Contacts\Model\ResourceModel\Contacts getResource()
 * @method \Training\Contacts\Model\ResourceModel\Contacts\Collection getCollection()
 */
class Contacts extends AbstractModel implements \Training\Contacts\Api\Data\ContactsInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * Contacts processing status
     */
    const STATUS_ANSWERED = 1;
    const STATUS_PRECESSING = 0;

    /**
     * Contacts page cache tag
     */
    const CACHE_TAG = 'training_contacts_contacts';
    /**
     * @var string
     */
    protected $_cacheTag = 'training_contacts_contacts';
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'training_contacts_contacts';
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Training\Contacts\Model\ResourceModel\Contacts');
    }

    /** get the status of processing
     * @return array
     */
    public function getTrainingContactsStatus()
    {
     return [self::STATUS_ANSWERED => __('Answered'), self::STATUS_PRECESSING => __('Answer processing')];
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int
     */
    public function getTrainingContactsId()
    {
        return parent::getData(self::TRAINING_CONTACTS_ID);
    }

    /**
     * Get Name
     * @return string
     */
    public function getTrainingContactsName()
    {
        return $this->getData(self::TRAINING_CONTACTS_NAME);
    }
    /**
     * Get Email
     * @return string
     */
    public function getTrainingContactsEmail()
    {
      return $this->getData(self::TRAINING_CONTACTS_EMAIL);
    }
    /**
     * Get Phone number
     * @return string
     */
    public function getTrainingContactsPhoneNumber()
    {
        return $this->getData(self::TRAINING_CONTACTS_PHONE_NUMBER);
    }
    /**
     * Get Message
     * @return string
     */
    public function getTrainingContactsMessage()
    {
     return $this->getData(self::TRAINING_CONTACTS_MESSAGE);
    }
    /**
     * Get Creation time
     * @return string
     */
    public function getTrainingContactsCreatedAt()
    {
     return $this->getData(self::CREATED_AT);
    }
    /**
     * Set ID
     *
     * @param int $id
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsId($id)
    {
       return $this->setData(self::TRAINING_CONTACTS_ID);
    }
    /**
     * Set name
     *
     * @param string $name
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsName($name)
    {
        return $this->setData(self::TRAINING_CONTACTS_NAME);
    }
    /**
     * Set email
     *
     * @param string $email
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsEmail($email)
    {
        return $this->setData(self::TRAINING_CONTACTS_EMAIL);
    }
    /**
     * Set Phone Number
     *
     * @param string $phoneNumber
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsPhoneNumber($phoneNumber)
    {
        return $this->setData(self::TRAINING_CONTACTS_PHONE_NUMBER);
    }
    /**
     * Set message
     *
     * @param string $message
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsMessage($message)
    {
        return $this->setData(self::TRAINING_CONTACTS_MESSAGE);
    }
    /**
     * Set Created time
     *
     * @param string $createdAt
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT);
    }
    /**
     * Set status
     *
     * @param string $status
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsStatus($status)
    {
        return $this->setData(self::STATUS);
    }
}