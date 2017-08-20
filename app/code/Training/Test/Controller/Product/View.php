<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 8/17/17
 * Time: 11:48 PM
 */

namespace Training\Test\Controller\Product;


class View extends \Magento\Framework\App\Action\Action
{
    public function execute() { // use preferences from di.xml
    echo "ONE"; exit;
    }
    /*public function beforeExecute() { // use plugin from di.xml
    echo "BEFORE<BR>"; exit;
    }
    public function afterExecute(\Magento\Catalog\Controller\Product\View $controller, $result) { // use plugin from di.xml
    echo "AFTER"; exit;
    }*/
}