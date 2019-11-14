@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Strategy design pattern example</h1>
                <p class="lead text-muted"></p>
                <p>
                    <a href="{{ route('product.index') }}" class="btn btn-primary my-2">Got to Enter</a>
                </p>
            </div>
        </section>
    </div>
@endsection
