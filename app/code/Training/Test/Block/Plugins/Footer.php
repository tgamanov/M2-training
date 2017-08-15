<?php

namespace Training\Test\Block\Plugins;


class Footer
{
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        return "Customized copyright!";
    }
}