<?php

namespace Hoekstra\CustomerPrevious\Model;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Reports\Model\Product\Index\ViewedFactory;
use Hoekstra\CustomerPrevious\Api\Data\RecentlyViewedProductInterfaceFactory;
use Hoekstra\CustomerPrevious\Api\RecentlyViewedProductRepositoryInterface;
use Hoekstra\CustomerPrevious\Api\Data\ProductInterfaceFactory;

class RecentlyViewedProductRepository implements RecentlyViewedProductRepositoryInterface {

    private $recentlyViewedProductInterfaceFactory;

    private $viewedFactory;

    private $product_factory;

    private $customerRepositoryInterface;

    /**
     * RecentlyViewedProductRepository constructor.
     *
     * @param RecentlyViewedProductInterfaceFactory $recentlyViewedProductInterfaceFactory
     * @param ViewedFactory $viewedFactory
     * @param ProductInterfaceFactory $product_factory
     * @param CustomerRepositoryInterface $customerRepositoryInterface
     */
    public function __construct(
        RecentlyViewedProductInterfaceFactory $recentlyViewedProductInterfaceFactory,
        ViewedFactory $viewedFactory,
        ProductInterfaceFactory $product_factory,
        CustomerRepositoryInterface $customerRepositoryInterface
    )
    {
        $this->recentlyViewedProductInterfaceFactory = $recentlyViewedProductInterfaceFactory;
        $this->viewedFactory = $viewedFactory;
        $this->product_factory = $product_factory;
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    /**
     * @param int $id
     *
     * @return \Hoekstra\CustomerPrevious\Api\Data\RecentlyViewedProductRepositoryInterface
     */
    public function getRecentlyViewedProductsForCustomer($id)
    {
        /** @var \Hoekstra\CustomerPrevious\Api\Data\RecentlyViewedProductRepositoryInterface $recentlyViewedInterface  */
        $recentlyViewedInterface = $this->recentlyViewedProductInterfaceFactory->create();

        $customer = $this->customerRepositoryInterface->getById($id);
        $recentlyViewedInterface->setId($id);
        $recentlyViewedInterface->setCustomerEmail($customer->getEmail());


        $viewedProductsCollection = $this->viewedFactory->create()->getCollection()->addAttributeToSelect(['name','sku'])->setCustomerId(2);
        $viewedProductsCollection->addIndexFilter();
        $viewedProductsCollection->addPriceData();

        $products = [];

        if (count($viewedProductsCollection) > 0) {
            foreach ($viewedProductsCollection as $item)
            {
                /** @var \Hoekstra\CustomerPrevious\Api\Data\ProductInterfaceFactory $product */
                $product = $this->product_factory->create();
                $product->setName($item->getName());
                $product->setSku($item->getSku());
                $product->setPrice($item->getData('price'));

                $products[] = $product;
            }
        }

        $recentlyViewedInterface->setProducts($products);
        return $recentlyViewedInterface;
    }
}
