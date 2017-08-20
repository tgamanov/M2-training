<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 8/17/17
 * Time: 4:35 PM
 */

namespace Training\Test\Controller\Action;


class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {

        $this->getResponse()->appendBody("HELLO WORLD");

    }
}