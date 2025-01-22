@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card social-card card-colored twitter-card">
                <div class="flex-wrap card-body d-flex align-items-center justify-content-center">
                    <i class="flex-shrink-0 icon-handbag"></i>
                    <div class="wrapper ms-3">
                        <h5 class="mb-0">Product</h5>
                        <h1 class="mb-0">{{ \App\Models\Product::count() }}+</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card social-card card-colored facebook-card">
                <div class="flex-wrap card-body d-flex align-items-center justify-content-center">
                    <i class="flex-shrink-0 icon-people"></i>
                    <div class="wrapper ms-3">
                        <h5 class="mb-0">Customers</h5>
                        <h1 class="mb-0">{{ \App\Models\User::where('level', 'user')->count() }}+</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card social-card card-colored instagram-card">
                <div class="flex-wrap card-body d-flex align-items-center justify-content-center">
                    <i class="flex-shrink-0 icon-chart"></i>
                    <div class="wrapper ms-3">
                        <h5 class="mb-0">Monthly Sales</h5>
                        <h1 class="mb-0">{{ \App\Models\Order::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count() }}+</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
