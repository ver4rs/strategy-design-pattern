<?php

namespace App\Repository\ProductRepository\SortProduct;

use App\Collection\ProductCollection;

/**
 * Class SortProductByTop
 */
class SortProductByTop implements SortProductStrategy
{
    /**
     * @param ProductCollection $items
     *
     * @return ProductCollection
     */
    public function sort(ProductCollection $items): ProductCollection
    {
        return $items;
    }
}
