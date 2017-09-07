<?php

namespace Training\RequireVerification\Model\Plugins;

use Magento\Sales\Api\OrderRepositoryInterface;

class Create
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository=$orderRepository;
    }

    public function afterCreateOrder(\Magento\Sales\Model\AdminOrder\Create $subject,$result)
    {
        $result->setRequireVerification(0);
        //$result->save(); // deprecated
        $this->orderRepository->save($result);
        return $result;
    }
}