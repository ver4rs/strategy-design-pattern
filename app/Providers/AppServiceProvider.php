<?php

namespace App\Providers;

use App\Collection\ProductCollection;
use App\Collection\ProductStrategyCollection;
use App\Entity\Product;
use App\Repository\ProductRepository\DummyORM\DummyProductRepository;
use App\Repository\ProductRepository\DummyORM\ProductRepository;
use App\Repository\ProductRepository\SortProduct\SortProductByBestSells;
use App\Repository\ProductRepository\SortProduct\SortProductByPrice;
use App\Repository\ProductRepository\SortProduct\SortProductByReview;
use App\Repository\ProductRepository\SortProduct\SortProductByTop;
use App\Repository\ProductRepository\SortProduct\SortProductStrategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     * @throws \App\Exceptions\DuplicateProductIdException
     */
    public function register()
    {
        // Bind implementation to interface
        $this->app->bind(ProductRepository::class, DummyProductRepository::class);

        // Set up our dummy Products to database
        $product1 = new Product(1,"Notebook A15", "Awesome notebook 2017", 12, 20,7, 25);
        $product2 = new Product(2,"laptop A15", "Beautiful laptop 15inch", 36, 10,5, 36);
        $product3 = new Product(3,"Monitor Adfef", "Qwesome monitor 21inch", 17, 10,6, 1);
        $product4 = new Product(4,"Book Abcdef", "Beautiful Book GoF", 78, 10,2, 0);
        $product5 = new Product(5,"T-shirt red", "Awesome red T-shirt", 11, 10,2, 6);
        $product6 = new Product(6,"PC cable A15", "Beautiful PC cable 1m", 5, 10,13, 12);
        $product7 = new Product(7,"Adapter to laptop v3", "Aaaaaa adapter to laptop", 9, 10,2, 2);

        $productCollection = new ProductCollection();
        $productCollection->add($product1);
        $productCollection->add($product2);
        $productCollection->add($product3);
        $productCollection->add($product4);
        $productCollection->add($product5);
        $productCollection->add($product6);
        $productCollection->add($product7);

        $this->app->bind(ProductCollection::class, function () use($productCollection) {
            return $productCollection;
        });

        //Product Sort Strategies
        $productStrategyCollection = new ProductStrategyCollection();
        $productStrategyCollection->add('top', new SortProductByTop());
        $productStrategyCollection->add('price-low', new SortProductByPrice());
        $productStrategyCollection->add('best-deals', new SortProductByBestSells());
        $productStrategyCollection->add('review', new SortProductByReview());


        // default strategy for Products Sorter
        $this->app->bind(SortProductStrategy::class, SortProductByTop::class);
        $this->app->bind(ProductStrategyCollection::class, function () use($productStrategyCollection) {
            return $productStrategyCollection;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
