<?php

namespace App\Repository\ProductRepository\DummyORM;

use App\Collection\ProductCollection;

/**
 * Class DummyProductRepository
 */
class DummyProductRepository implements ProductRepository
{
    /** @var ProductCollection */
    private $productCollection;

    /**
     * @param ProductCollection $productCollection
     */
    public function __construct(ProductCollection $productCollection)
    {
        $this->productCollection = $productCollection;
    }

    /**
     * @return ProductCollection
     */
    public function getAll(): ProductCollection
    {
        return $this->productCollection;
    }
}
