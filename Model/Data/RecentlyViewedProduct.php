<?php

namespace Hoekstra\CustomerPrevious\Model\Data;

use Hoekstra\CustomerPrevious\Api\Data\RecentlyViewedProductInterface;
use Hoekstra\CustomerPrevious\Model\Data\ViewedProduct;
use Magento\Framework\DataObject;

class RecentlyViewedProduct extends DataObject implements RecentlyViewedProductInterface {

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->getData('customer_email');
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setCustomerEmail($email)
    {
        return $this->setData('customer_email', $email);
    }

    /**
     * @return ViewedProduct
     */
    public function getProducts() {
        return $this->getData('products');
    }

    /**
     * @param array $products
     *
     * @return $this
     */
    public function setProducts( $products ) {
        return $this->setData('products', $products);
    }
}
