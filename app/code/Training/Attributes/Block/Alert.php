<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 8/28/17
 * Time: 3:43 PM
 */

namespace Training\Attributes\Block;


class Alert extends \Magento\Framework\View\Element\Template
{
public function getFullActionName()
{
    return $this->_request->getFullActionName();
}
}