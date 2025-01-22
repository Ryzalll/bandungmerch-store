@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(session('info'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif

                        <a href="/category/create" class="mb-3 btn btn-success">
                            <i class="icon-plus"></i> Add Category
                        </a>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->code }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="/category/edit/{{ $category->id }}" class="btn btn-sm btn-info">
                                                <i class="icon-pencil"></i> Edit
                                            </a>
                                            <a href="/category/delete/{{ $category->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete thi category?')">
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
