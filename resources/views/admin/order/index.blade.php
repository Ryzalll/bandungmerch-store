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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User ID</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailOrderModal"
                                        data-id="{{ $order->id }}">
                                        <i class="icon-eye"></i> Detail
                                    </button>
                                    <button class="btn btn-sm btn-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editOrderModal"
                                        data-id="{{ $order->id }}"
                                        data-status="{{ $order->status }}">
                                        <i class="icon-pencil"></i> Edit
                                    </button>
                                    <a href="/order/delete/{{ $order->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this order?')">
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

<!-- Modal for Edit -->
<div class="modal fade" id="editOrderModal" tabindex="-1" aria-labelledby="editOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editOrderForm" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalLabel">Edit Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="py-3 form-control" id="status" name="status">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal for Detail -->
<div class="modal fade" id="detailOrderModal" tabindex="-1" aria-labelledby="detailOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailOrderModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6><strong>Transaction Code:</strong> <span id="transactionCode"></span></h6>
                <h6><strong>User:</strong> <span id="userName"></span></h6>
                <h6><strong>Payment:</strong> <span id="paymentStatus"></span></h6>

                <hr>

                <h6><strong>Order Details:</strong></h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="orderDetailsTable">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const editOrderModal = document.getElementById('editOrderModal');
    editOrderModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const orderId = button.getAttribute('data-id');
        const status = button.getAttribute('data-status');
        const editForm = editOrderModal.querySelector('#editOrderForm');

        // Set form action and status
        editForm.action = `/order/update/${orderId}`;
        editOrderModal.querySelector('#status').value = status;
    });

    const detailOrderModal = document.getElementById('detailOrderModal');
    detailOrderModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const orderId = button.getAttribute('data-id');

        // Clear previous data
        document.getElementById('transactionCode').textContent = '';
        document.getElementById('userName').textContent = '';
        document.getElementById('paymentStatus').textContent = '';
        document.getElementById('orderDetailsTable').innerHTML = '';

        // Fetch order details
        fetch(`/order/${orderId}`)
            .then(response => response.json())
            .then(order => {
                document.getElementById('transactionCode').textContent = order.code;
                document.getElementById('userName').textContent = order.user.name || 'N/A';
                document.getElementById('paymentStatus').textContent = order.payments?.status || 'Unpaid';

                const detailsTable = document.getElementById('orderDetailsTable');
                order.details.forEach(detail => {
                    const row = `
                        <tr>
                            <td>${detail.product?.name || 'Unknown'}</td>
                            <td>${detail.quantity}</td>
                            <td>${detail.price}</td>
                            <td>${detail.amount}</td>
                        </tr>
                    `;
                    detailsTable.innerHTML += row;
                });
            })
            .catch(error => console.error(error));
    });
</script>
@endsection

