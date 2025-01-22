@extends('layouts.app')

@section('content')
<div class="w-full mt-20">
    <div class="grid items-center justify-center w-11/12 grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-3 lg:w-2/3">
        <div class="flex flex-col items-center col-span-1">
            <img src="{{ asset('assets/bandung merch.png') }}" alt="Logo Bandung Merch" class="w-48 max-w-full">
            <h2 class="mt-2 text-2xl font-bold text-center md:text-3xl text-slate-600">
                <i class="fas fa-shopping-cart"></i>
                My Cart
            </h2>
        </div>
        <div class="col-span-2">
            <div class="w-full max-w-2xl mx-auto pointer-events-auto">
                <form action="/cartpayment" method="post">
                    @csrf
                    <input type="hidden" name="total_amount" value="{{ $total_amount }}">
                    <div class="flex flex-col h-full overflow-y-scroll bg-white rounded-lg shadow-xl">
                        <div class="flex-1 px-4 py-6 overflow-y-auto sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                            </div>

                            @if (count($carts) < 1)
                            <h1 class="mt-3 text-xl text-red-600">Your cart is empty!</h1>
                            @else
                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                        @foreach ($carts as $cart)
                                        <input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
                                        <input type="hidden" name="product_id[]" value="{{ $cart->product->id }}">
                                        <li class="flex py-6">
                                            <div class="w-32 h-32 overflow-hidden border border-gray-200 rounded-md shrink-0">
                                                <img src="/storage/products/{{ $cart->product->photo }}" alt="{{ $cart->product->name }}" class="object-cover w-full h-full">
                                            </div>
                                            <div class="flex flex-col flex-1 ml-4">
                                                <div>
                                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                                        <h2>
                                                            <a href="">{{ $cart->product->name }}</a>
                                                        </h2>
                                                        <p class="ml-4">Rp. {{ number_format($cart->product->price, 2, ',', '.') }}</p>
                                                    </div>
                                                    <p class="mt-1 text-sm text-gray-500">{{ $cart->product->description }}</p>
                                                </div>
                                                <div class="flex items-end justify-between flex-1 text-sm">
                                                    <p class="text-gray-500">Qty {{ $cart->quantity }}</p>
                                                    <div class="flex">
                                                        <a href="/cart/delete/{{ $cart->id }}" class="font-medium text-indigo-600 hover:text-indigo-500" onclick="return confirm('Are you sure want to remove product from your cart?')">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="px-4 py-6 border-t border-gray-200 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Subtotal</p>
                                <p>Rp. {{ number_format($total_amount, 2, ',', '.') }}</p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                            <div class="mt-6">
                                <button type="submit" class="flex items-center justify-center w-full px-6 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">Checkout</button>
                            </div>
                            <div class="flex justify-center mt-6 text-sm text-center text-gray-500">
                                <p>
                                    <a href="/orderstatus" class="font-medium text-green-600 hover:text-green-500">
                                        &larr; View Order Status
                                    </a>
                                    <span class="mx-2">or</span>
                                    <a href="/products" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Continue Shopping &rarr;
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
