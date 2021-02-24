<?php

namespace Hoekstra\CustomerPrevious\Api\Data;

use Hoekstra\CustomerPrevious\Api\Data\ProductInterface;

interface RecentlyViewedProductInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getCustomerEmail();

    /**
     * @param string $email
     * @return $this
     */
    public function setCustomerEmail($email);

    /**
     * @return \Hoekstra\CustomerPrevious\Api\Data\ProductInterface[]
     */
    public function getProducts();

    /**
     * @param array $products
     *
     * @return $this
     */
    public function setProducts($products);

}
