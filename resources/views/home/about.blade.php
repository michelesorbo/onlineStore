@extends('app')
@section('title',$viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg4 ms-auto">
            <p class="lead">{{ $viewData['description']}}</p>
        </div>
        <div class="col-lg4 ms-auto">
            <p class="lead">{{ $viewData['author']}}</p>
        </div>
    </div>
</div>
@endsection
