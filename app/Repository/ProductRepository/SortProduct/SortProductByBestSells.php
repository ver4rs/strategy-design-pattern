<?php

namespace App\Repository\ProductRepository\SortProduct;

use App\Collection\ProductCollection;
use App\Entity\ProductInterface;

/**
 * Class SortProductByPrice
 */
class SortProductByBestSells implements SortProductStrategy
{
    /**
     * @param ProductCollection $items
     *
     * @return ProductCollection
     * @throws \App\Exceptions\DuplicateProductIdException
     */
    public function sort(ProductCollection $items): ProductCollection
    {
        $items = $items->getItems();

        usort($items, function (ProductInterface $item1, ProductInterface $item2) {
           return $item2->getSold() <=> $item1->getSold();
        });

        $newData = new ProductCollection;
        foreach ($items as $item) {
            $newData->add($item);
        }

        return $newData;    }
}
