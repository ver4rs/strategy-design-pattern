<?php

namespace App\Repository\ProductRepository\SortProduct;

use App\Collection\ProductCollection;
use App\Collection\ProductStrategyCollection;

/**
 * Class SorterProducts
 */
class SorterProducts
{
    /** @var ProductStrategyCollection $productStrategyCollection */
    private $productStrategyCollection;

    /** @var SortProductStrategy $sortProducts */
    private $sortProducts;

    /**
     * @param ProductStrategyCollection $productStrategyCollection
     * @param SortProductStrategy       $sortProducts
     */
    public function __construct(ProductStrategyCollection $productStrategyCollection, SortProductStrategy $sortProducts)
    {
        $this->productStrategyCollection = $productStrategyCollection;
        $this->sortProducts              = $sortProducts;
    }

    /**
     * @param ProductCollection $items
     *
     * @return ProductCollection
     */
    public function sort(ProductCollection $items)
    {
        return $this->sortProducts->sort($items);
    }

    /**
     * Set sort strategy
     *
     * @param string $nameStrategy
     *
     * @throws \App\Exceptions\ProductStrategyNotFoundException
     */
    public function setSortStrategy(string $nameStrategy): void
    {
        $strategy = $this->productStrategyCollection->findByName($nameStrategy);

        $this->sortProducts = $strategy;
    }
}
