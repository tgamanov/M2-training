<?php

namespace Training\Repository\Model\ResourceModel\Example;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'Example_id';


    protected function _construct()
    {
        $this->_init('Training\Repository\Model\Example', 'Training\Repository\Model\ResourceModel\Example');
    }

}