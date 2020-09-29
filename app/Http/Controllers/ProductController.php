<?php

namespace App\Http\Controllers;

use App\Http\Handlers\Action\ShowAllProductHandler;
use Illuminate\Http\Request;

/**
 * Class ProductController
 */
class ProductController extends Controller
{
    /** @var ShowAllProductHandler $showAllProductHandler */
    private $showAllProductHandler;

    /** @var Request $request */
    private $request;

    /**
     * @param ShowAllProductHandler $showAllProductHandler
     * @param Request               $request
     */
    public function __construct(ShowAllProductHandler $showAllProductHandler, Request $request)
    {
        $this->showAllProductHandler = $showAllProductHandler;
        $this->request = $request;
    }

    /**
     * @throws \App\Exceptions\ProductStrategyNotFoundException
     */
    public function index()
    {
        $showAllproducts = $this->showAllProductHandler->viewAllProducts($this->request->get('sort'));

        return view($showAllproducts['template'], $showAllproducts['params']);
    }
}
