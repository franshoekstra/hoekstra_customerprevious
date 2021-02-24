<?php

namespace Hoekstra\CustomerPrevious\Api;

interface RecentlyViewedProductRepositoryInterface {

    /**
     * @param int $id
     * @return \Hoekstra\CustomerPrevious\Api\Data\RecentlyViewedProductInterface
     */
    public function getRecentlyViewedProductsForCustomer($id);

}
