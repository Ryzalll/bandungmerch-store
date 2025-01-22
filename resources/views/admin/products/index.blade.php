@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="/product/create" class="mb-3 btn btn-success">
                    <i class="icon-plus"></i> Add Product
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key =>$product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <img src="{{asset( 'storage/products/' . $product->photo) }}" alt="{{ $product->name }}" class="rounded">
                                    </td>
                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <a href="/product/edit/{{ $product->id }}" class="btn btn-sm btn-info">
                                            <i class="icon-pencil"></i> Edit
                                        </a>
                                        <a href="/product/delete/{{ $product->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this product?')">
                                            <i class="icon-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
