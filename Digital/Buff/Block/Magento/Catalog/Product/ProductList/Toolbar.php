<?php

namespace Digital\Buff\Block\Magento\Catalog\Product\ProductList;


class Toolbar extends \Magento\Catalog\Block\Product\ProductList\Toolbar
{

 /**
     * Set collection to pager
     *
     * @param \Magento\Framework\Data\Collection $collection
     * @return $this
     */
    public function setCollection($collection)
    {
        $this->_collection = $collection;

        $this->_collection->setCurPage($this->getCurrentPage());

        // we need to set pagination only if passed value integer and more that 0
        $limit = (int)$this->getLimit();
        if ($limit) {
            $this->_collection->setPageSize($limit);
        }
        if ($this->getCurrentOrder()) {
            switch ($this->getCurrentOrder()) {
                case 'price':
                    $this->_collection->setOrder($this->getCurrentOrder(), 'ASC');
                    break;

                case 'price_desc':
                    $this->_collection
                            ->getSelect()
                            ->order('price_index.price DESC');
                    break;
                case 'newest':
                $this->_collection
                    ->getSelect()
                    ->order('e.created_at DESC');
            break;

            case 'oldest':
                $this->_collection
                    ->getSelect()
                    ->order('e.created_at ASC');

            break;
        
        case 'name_az':
                $this->_collection
                    ->getSelect()
                    ->order('entity_id ASC');
            break;

            case 'name_za':
                $this->_collection
                    ->getSelect()
                    ->order('entity_id DESC');
            break;
                    
                default:
                    //$this->_collection->setOrder($this->getCurrentOrder(), $this->getCurrentDirection());
                    $this->_collection->setOrder($this->getCurrentOrder(), 'DESC');
                break;
            }
        }

        return $this;
    }

}

	