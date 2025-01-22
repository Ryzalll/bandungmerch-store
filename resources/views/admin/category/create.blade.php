@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="/category" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="code" class="form-label">Category Code</label>
                        <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror">
                        @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="/category" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
            </div>
        </div>
</div>
@endsection
