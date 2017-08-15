<?php

namespace Training\Test\Model\Plugins;

class Product
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result * 2;
    }
}