<?php

namespace Digital\Buff\Model\Magento\Catalog;


class Config extends \Magento\Catalog\Model\Config
{

 public function getAttributeUsedForSortByArray()
    {
     

        $options = ['position' => __('Most Popular')];
        foreach ($this->getAttributesUsedForSortBy() as $attribute) {
            /* @var $attribute \Magento\Eav\Model\Entity\Attribute\AbstractAttribute */
            $options[$attribute->getAttributeCode()] = $attribute->getStoreLabel();
        }

        $options['position'] = __('Most Popular');
        $options['price'] =  __('Price: Low to High');
        $options['price_desc'] = __('Price: High to Low');
         $options['newest'] = __('Newest');
        $options['oldest'] = __('Oldest');
        $options['name_az'] = __('Product Name A - Z');
        $options['name_za'] = __('Product Name Z - A');
        
        return $options;
    }
    
}

	