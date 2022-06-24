@extends('app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="row">
    <div class="col-md6 col-lg-4 mb-2">
        <img src="{{ asset('img/game.png')}}" class="img-fluid rounded">
    </div>
    <div class="col-md6 col-lg-4 mb-2">
        <img src="{{ asset('img/safe.png')}}" class="img-fluid rounded">
    </div>
    <div class="col-md6 col-lg-4 mb-2">
        <img src="{{ asset('img/submarine.png')}}" class="img-fluid rounded">
    </div>
</div>
@endsection
