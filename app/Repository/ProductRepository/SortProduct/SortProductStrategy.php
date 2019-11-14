<?php

namespace App\Repository\ProductRepository\SortProduct;

use App\Collection\ProductCollection;

/**
 * Interface SortProductStrategy
 */
interface SortProductStrategy
{
    /**
     * @param ProductCollection $items
     *
     * @return ProductCollection
     */
    public function sort(ProductCollection $items): ProductCollection;
}
