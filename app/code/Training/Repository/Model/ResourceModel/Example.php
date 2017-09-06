<?php

namespace Training\Repository\Model\ResourceModel;

class Example extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('Example', 'Example_id');
    }

}