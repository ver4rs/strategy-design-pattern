<?php

namespace App\Repository\ProductRepository\DummyORM;

use App\Collection\ProductCollection;

/**
 * Class DummyProductRepository
 */
interface ProductRepository
{
    /**
     * @return ProductCollection
     */
    public function getAll(): ProductCollection;
}
