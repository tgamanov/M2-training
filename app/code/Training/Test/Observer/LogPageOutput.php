<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 8/14/17
 * Time: 7:24 PM
 */

namespace Training\Test\Observer;

use Magento\Framework\Event\ObserverInterface;


class LogPageOutput implements ObserverInterface
{
    /**
     * @var null|\Psr\Log\LoggerInterface
     */
    protected $_logger = null;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $response = $observer->getEvent()->getData('response');
        $body = $response->getBody();
        $this->_logger->addDebug("--------\n\n\n BODY \n\n\n " . $body);
    }
}