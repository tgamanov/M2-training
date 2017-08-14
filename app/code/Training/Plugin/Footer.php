<?php

namespace Training\Plugin;


class Footer
{
    public function aftergetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        return "Customized copyright!";
    }
}