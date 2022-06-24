@extends('app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('/img/'.$viewData['product']->getImage()) }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-boby">
                <h5 class="card-title">{{ $viewData['product']->getName() }} - {{ $viewData['product']->getPrice() }}</h5>
                <p class="card-text">{{ $viewData['product']->getDescription() }}</p>
                <p class="card-text"><small class="text-muted">Add to cart</small></p>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('product.index') }}" class="btn bg-primary text-white">Lista Prodotti</a>
@endsection
