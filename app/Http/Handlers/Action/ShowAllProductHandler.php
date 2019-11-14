<?php

namespace App\Http\Handlers\Action;

use App\Repository\ProductRepository\DummyORM\ProductRepository;
use App\Repository\ProductRepository\SortProduct\SorterProducts;

/**
 * Class ShowAllProductHandler
 */
class ShowAllProductHandler
{
    /** @var ProductRepository $productRepository */
    private $productRepository;

    /** @var SorterProducts $sorterProducts */
    private $sorterProducts;

    /**
     * @param ProductRepository $productRepository
     * @param SorterProducts    $sorterProducts
     */
    public function __construct(ProductRepository $productRepository, SorterProducts $sorterProducts)
    {
        $this->productRepository = $productRepository;
        $this->sorterProducts    = $sorterProducts;
    }

    /**
     * @param string|null $nameStrategy name of strategy
     *
     * @return array
     * @throws \App\Exceptions\DuplicateProductIdException
     */
    public function viewAllProducts(?string $nameStrategy = null)
    {
        $products = $this->productRepository->getAll();

        if (!is_null($nameStrategy)) {
            $this->sorterProducts->setSortStrategy($nameStrategy);
        }

        $sortedProducts = $this->sorterProducts->sort($products)
            ->getItems();

        return [
            'params' => [
                'products' => $sortedProducts,
            ],
            'template' => 'product.index',
        ];
    }
}
