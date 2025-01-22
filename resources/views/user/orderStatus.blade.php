@extends('layouts.app')

@section('content')
<div class="w-full py-10 mt-20 bg-gray-50">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-center text-gray-800 fade-in">Order Status</h2>
        <p class="mt-2 text-center text-gray-600 fade-in">Track your orders and see their current status.</p>

        <div class="mt-8">
            @if($orders->isEmpty())
                <div class="p-6 text-center bg-white border border-gray-200 rounded-lg shadow-md fade-in">
                    <p class="text-lg font-medium text-gray-700">No orders found for this status.</p>
                    <a href="/products" class="inline-block px-6 py-2 mt-4 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700 fade-in">
                        Start Shopping
                    </a>
                </div>
            @else
                <ul class="space-y-6">
                    @foreach($orders as $order)
                        <li class="p-6 bg-white border border-gray-200 rounded-lg shadow-md fade-in">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">Order #{{ $order->code }}</h3>
                                    <p class="mt-1 text-sm text-gray-500">Placed on: {{ $order->created_at->format('d M Y') }}</p>
                                </div>
                                <div class="mt-4 sm:mt-0">
                                    <span class="px-4 py-1 text-sm font-medium text-white rounded-full 
                                        @if($order->status == 'pending') bg-yellow-400
                                        @elseif($order->status == 'processing') bg-blue-400
                                        @elseif($order->status == 'shipped') bg-indigo-400
                                        @elseif($order->status == 'delivered') bg-green-400
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4 class="text-sm font-semibold text-gray-600">Order Details:</h4>
                                <ul class="mt-2 space-y-1 text-sm text-gray-600">
                                    @foreach($order->details as $detail)
                                        <li>
                                            - {{ $detail->product->name }} x {{ $detail->quantity }} pcs @ Rp. {{ number_format($detail->price, 2, ',', '.') }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="mt-4 text-right">
                                <p class="text-lg font-semibold text-gray-800">Total: Rp. {{ number_format($order->total_amount, 2, ',', '.') }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fadeElements = document.querySelectorAll('.fade-in');

        function isInViewport(el) {
            const rect = el.getBoundingClientRect();
            return rect.top <= window.innerHeight && rect.bottom >= 0;
        }

        function toggleVisibility() {
            fadeElements.forEach((el) => {
                if (isInViewport(el)) {
                    el.classList.add('show');
                } else {
                    el.classList.remove('show');
                }
            });
        }

        window.addEventListener('scroll', toggleVisibility);
        toggleVisibility();
    });
</script>
@endsection
