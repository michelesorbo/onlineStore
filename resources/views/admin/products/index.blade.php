@extends('admin')
@section('title', $viewData["title"])
@section('content')
<!-- Form per inserire i prodotti -->
<div class="card mb-4">
    <div class="card-header">Crea Nuovo Prodotto</div>
    <div class="card-body">
        @if ($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('admin.product.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="col-lg2 col-md6 col-sm-12">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<!-- FINE Form per inserire i prodotti -->
<div class="card">
    <div class="card-header">Manage Products</div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
