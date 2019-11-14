<?php

namespace App\Repository\ProductRepository\SortProduct;

use App\Collection\ProductCollection;
use App\Collection\ProductStrategyCollection;
use App\Entity\ProductInterface;

/**
 * Class SorterProducts
 */
class SorterProducts
{
    /** @var ProductStrategyCollection $productStrategyCollection */
    private $productStrategyCollection;

    /** @var string $nameStrategy */
    private $nameStrategy;

    /**
     * @param ProductStrategyCollection $productStrategyCollection
     */
    public function __construct(ProductStrategyCollection $productStrategyCollection)
    {
        $this->productStrategyCollection = $productStrategyCollection;
    }

    /**
     * @param ProductCollection $items
     *
     * @return ProductCollection
     * @throws \App\Exceptions\DuplicateProductIdException
     */
    public function sort(ProductCollection $items)
    {
        switch ($this->nameStrategy) {
            case 'top':
                //$items = $items;
                break;

            case 'price-low':
                //$this->sortProducts = new SortProductByPrice();
                $items = $items->getItems();

                usort($items, function (ProductInterface &$item1, ProductInterface &$item2) {
                    return $item1->getPrice() <=> $item2->getPrice();
                });

                $newData = new ProductCollection;
                foreach ($items as $item) {
                    $newData->add($item);
                }
                $items = $newData;
                break;

            case 'best-deals':
                $items = $items->getItems();

                usort($items, function (ProductInterface $item1, ProductInterface $item2) {
                    return $item2->getSold() <=> $item1->getSold();
                });

                $newData = new ProductCollection;
                foreach ($items as $item) {
                    $newData->add($item);
                }
                $items = $newData;
                break;

            case 'review':
                $items = $items->getItems();

                usort($items, function (ProductInterface $item1, ProductInterface $item2) {
                    return $item2->getCountReviews() <=> $item1->getCountReviews();
                });

                $newData = new ProductCollection;
                foreach ($items as $item) {
                    $newData->add($item);
                }
                $items = $newData;
                break;
            default:
                // without change $items
                break;
        }


        return $items;
    }

    /**
     * Set sort strategy
     *
     * @param string $nameStrategy
     */
    public function setSortStrategy(string $nameStrategy): void
    {
        $this->nameStrategy = $nameStrategy;
    }

}
