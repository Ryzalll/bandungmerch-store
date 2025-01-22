@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="/product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category ID</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror py-3">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror">
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror">
                        @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img src="/assets/no-photo.jpg" alt="" class="img-fluid" id="img-preview">
                            </div>
                            <div class="col-9">
                                <label for="photo" class="form-label">Product Photo</label>
                                <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" onchange="previewImage(event)">
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="/product" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    function previewImage(event) {
         var input = event.target;
         var image = document.getElementById('img-preview');
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
</script>
@endsection
