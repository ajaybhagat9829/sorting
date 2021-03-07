<?php

namespace Digital\Buff\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

	const MODULE_ENABLE = "customsort/general/enable";

	
	 public function getDefaultConfig($path)
   {
       return $this->scopeConfig->getValue($path, \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
   }

   public function isModuleEnabled()
   {
       return (bool) $this->getDefaultConfig(self::MODULE_ENABLE);
   }

}
