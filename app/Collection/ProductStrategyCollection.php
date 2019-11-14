<?php

namespace App\Collection;

use App\Exceptions\ProductStrategyNotFoundException;
use App\Repository\ProductRepository\SortProduct\SortProductStrategy;

/**
 * Class ProductStrategyCollection
 */
class ProductStrategyCollection
{
    /** @var array array $strategies */
    private $strategies;

    /**
     * @param string              $nameStrategy
     * @param SortProductStrategy $sortProductStrategy
     *
     * @return void
     */
    public function add(string $nameStrategy, SortProductStrategy $sortProductStrategy): void
    {
        if (empty($this->strategies[$nameStrategy]))
        {
            $this->strategies[$nameStrategy] = $sortProductStrategy;
        }
    }

    /**
     * @param string $name
     *
     * @return mixed|null
     * @throws ProductStrategyNotFoundException
     */
    public function findByName(string $name)
    {
        if (count($this->getAll()) == 0) {
            throw new ProductStrategyNotFoundException('');
        }

        if (array_key_exists($name, $this->getAll())) {
            return $this->getAll()[$name];
        }

        // get first default key
        $keyFirst = array_key_first($this->getAll());
        return $this->getAll()[$keyFirst];
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->strategies;
    }
}
