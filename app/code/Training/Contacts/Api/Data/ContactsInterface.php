<?php

namespace Training\Contacts\Api\Data;

/**
 * Interface ContactsInterface
 * @package Training\Contacts\Api\Data
 */

interface ContactsInterface
{
    const TRAINING_CONTACTS_ID = 'training_contacts_id';
    const TRAINING_CONTACTS_NAME = 'training_contacts_name';
    const TRAINING_CONTACTS_EMAIL = 'training_contacts_email';
    const TRAINING_CONTACTS_PHONE_NUMBER = 'training_contacts_phone_number';
    const TRAINING_CONTACTS_MESSAGE = 'training_contacts_message';
    const CREATED_AT = 'created_at';
    const STATUS = 'status';

    /**
     * Get training_contacts_id
     *
     * @return int|null
     */
    public function getTrainingContactsId();

    /**
     * Get training_contacts_name
     *
     * @return string
     */
    public function getTrainingContactsName();

    /**
     * Get training_contacts_email
     *
     * @return string
     */
    public function getTrainingContactsEmail();

    /**
     * Get training_contacts_name
     *
     * @return string
     */
    public function getTrainingContactsPhoneNumber();

    /**
     * Get training_contacts_phone_number
     *
     * @return string
     */
    public function getTrainingContactsMessage();

    /**
     * Get created_at
     *
     * @return string
     */
    public function getTrainingContactsCreatedAt();

    /**
     * Get status
     *
     * @return string
     */
    public function getTrainingContactsStatus();

    /**
     * Set training_contacts_id
     *
     * @param int $id
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsId($id);

    /**
     * Set Name
     *
     * @param string $name
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsName($name);

    /**
     * Set Email
     *
     * @param string $email
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsEmail($email);

    /**
     * Set Phone Number
     *
     * @param string $phoneNumber
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsPhoneNumber($phoneNumber);

    /**
     * Set message
     *
     * @param string $message
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsMessage($message);

    /**
     * Set Creation time
     *
     * @param string $createdAt
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsCreatedAt($createdAt);

    /**
     * Set status
     *
     * @param string $status
     * @return \Training\Contacts\Api\Data\ContactsInterface
     */
    public function setTrainingContactsStatus($status);

}