@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sales Data</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Order Code</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sale->user->name }}</td>
                                <td>{{ $sale->code }}</td>
                                <td>{{ number_format($sale->total_amount, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-success">{{ ucfirst($sale->status) }}</span>
                                </td>
                                <td>{{ $sale->updated_at->format('d M Y') }}</td>
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
