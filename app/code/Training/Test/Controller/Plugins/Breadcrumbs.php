<?php

namespace Training\Test\Controller\Plugins;

class Breadcrumbs
{
    public function aroundAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, \Closure $proceed, $crumbName, $crumbInfo)
    {
        $crumbName = $crumbName."!";
        $crumbInfo['label'] = $crumbName;
        $result = $proceed($crumbName, $crumbInfo);
        return $result;
    }
}