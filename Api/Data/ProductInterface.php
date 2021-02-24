<?php

namespace Hoekstra\CustomerPrevious\Api\Data;

interface ProductInterface {

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getSku();

    /**
     * @param string $sku
     *
     * @return $this
     */
    public function setSku($sku);

    /**
     * @return string
     */
    public function getPrice();

    /**
     * @param string $price
     *
     * @return $this
     */
    public function setPrice($price);
}
