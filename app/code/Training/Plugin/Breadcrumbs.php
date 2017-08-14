<?php

namespace Training\Plugin;

class Breadcrumbs
{
    public function aroundaddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, \Closure $proceed, $crumbName, $crumbInfo)
    {
        $crumbName = $crumbName."!";
        $crumbInfo['label'] = $crumbName;
        $result = $proceed($crumbName, $crumbInfo);
        return $result;
    }
}