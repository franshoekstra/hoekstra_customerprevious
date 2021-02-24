<?php

namespace Hoekstra\CustomerPrevious\Model\Data;

use Hoekstra\CustomerPrevious\Api\Data\ProductInterface;
use Magento\Framework\DataObject;

class ViewedProduct extends DataObject implements ProductInterface {

    /**
     * @return string
     */
    public function getName() {
        return $this->getData('name');
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName( $name ) {
        return $this->setData('name', $name);
    }

    /**
     * @return string
     */
    public function getSku() {
        return $this->getData('sku');
    }

    /**
     * @param string $sku
     *
     * @return $this
     */
    public function setSku( $sku ) {
        return $this->setData('sku', $sku);
    }

    /**
     * @return string
     */
    public function getPrice() {
        return $this->getData('price');
    }

    /**
     * @param string $price
     *
     * @return $this
     */
    public function setPrice( $price ) {
        return $this->setData('price', $price);
    }
}
