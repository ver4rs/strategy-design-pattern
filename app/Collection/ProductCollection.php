<?php

namespace App\Collection;

use App\Entity\ProductInterface;
use App\Exceptions\DuplicateProductIdException;

/**
 * Class ProductCollection
 */
class ProductCollection
{
    /** @var array array */
    private $items = [];

    /**
     * @param ProductInterface $product
     *
     * @return void
     * @throws DuplicateProductIdException
     */
    public function add(ProductInterface $product): void
    {
        if (!empty($this->items[$product->getId()]))
        {
            throw new DuplicateProductIdException($product->getId());
        }

        $this->items[$product->getId()] = $product;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }
}
