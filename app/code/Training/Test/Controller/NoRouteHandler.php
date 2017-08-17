<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 8/17/17
 * Time: 4:27 PM
 */

namespace Training\Test\Controller;


class NoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{
    public function process(\Magento\Framework\App\RequestInterface $request) {
        $moduleName = 'cms';
        $controllerName = 'index';
        $actionName = 'index';
        $request
            ->setModuleName($moduleName)
            ->setControllerName($controllerName)
            ->setActionName($actionName);
        return true;
    }
}