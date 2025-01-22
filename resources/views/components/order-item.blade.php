<li class="p-6 bg-white border border-gray-200 rounded-lg shadow-md">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Order #{{ $order->code }}</h3>
            <p class="mt-1 text-sm text-gray-500">Placed on: {{ $order->created_at->format('d M Y') }}</p>
        </div>
        <div>
            <span class="px-4 py-1 text-sm font-medium text-white rounded-full 
                @if($order->status == 'pending') bg-yellow-400
                @elseif($order->status == 'processing') bg-blue-400
                @elseif($order->status == 'shipping') bg-indigo-400
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
