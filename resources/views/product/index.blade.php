@extends('layouts.app')

@section('title', 'Listing products')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">Listing products!</h1>
                <p class="lead">This is a simple hero unit.</p>
                <hr class="my-4">
                <p>It uses utility classes.</p>
                <p class="lead">
                    {{--<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>--}}
                </p>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col">

            <div class="navs-toolbar mb-4">
                <nav class="nav nav-pills nav-fill">
                    <a class="nav-item nav-link {{ (Request::get('sort') == 'top' || !Request::has('sort')) ? ' active': '' }}" href="{{ route('product.index', ['sort' => 'top']) }}">TOP</a>
                    <a class="nav-item nav-link {{ Request::get('sort') == 'price-low' ? ' active': '' }}" href="{{ route('product.index', ['sort' => 'price-low']) }}">Price Low to High</a>
                    <a class="nav-item nav-link {{ Request::get('sort') == 'review' ? ' active': '' }}" href="{{ route('product.index', ['sort' => 'review']) }}">&starf; By review</a>
                    <a class="nav-item nav-link {{ Request::get('sort') == 'best-deals' ? ' active': '' }}" href="{{ route('product.index', ['sort' => 'best-deals']) }}">Best Deals</a>
                </nav>
            </div>

            <div class="listing-products">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="card mb-4 position-relative">
                                <img src="https://picsum.photos/id/{{rand(0,200)}}/350/200" height="200" alt="{{ $product->getName() }}" class="card-img-top">
                                <div class="rating position-absolute text-warning">
                                    <h3 class="">&starf;&nbsp;<small>{{ $product->getCountReviews() }}</small></h3>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->getName() }}</h5>
                                    <p class="card-text">{{ $product->getDescription() }}</p>
                                    <p class="text-success">Price: {{ $product->getPrice() }}$</p>
                                    <p>
                                        <small class="text-secondary">Quantity: {{ $product->getQuantity() }}</small>
                                        <br>
                                        <small class="text-secondary">Sold: {{ $product->getSold() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
