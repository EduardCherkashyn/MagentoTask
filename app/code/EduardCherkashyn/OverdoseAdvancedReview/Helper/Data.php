<?php
/**
 * Created by PhpStorm.
 * User: eduardcherkashyn
 * Date: 2020-08-01
 * Time: 21:16
 */

namespace EduardCherkashyn\OverdoseAdvancedReview\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const MODULE_ENABLE = "catalog/review/overdose_review";

    public function getDefaultConfig($path)
    {
        return $this->scopeConfig->getValue($path, \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
    }

    public function isModuleEnabled()
    {
        return (bool) $this->getDefaultConfig(self::MODULE_ENABLE);
    }
}

