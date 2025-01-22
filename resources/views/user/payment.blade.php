@extends('layouts.app')

@section('content')
<div class="flex justify-center px-4">
    <div class="grid w-full p-4 mb-5 rounded-lg shadow-lg bg-slate-200 md:w-2/3" style="margin-top: 100px">
        <div class="flex justify-center w-full mb-2 justify-self-center">
            <img src="{{ asset('assets/bandung merch.png') }}" alt="Logo Bandung Merch" class="w-32 md:w-48">
        </div>
        <h1 class="text-2xl text-center md:text-3xl">
            <i class="text-green-500 fas fa-check-circle"></i>
            PAYMENT CONFIRMATION
        </h1>
        <hr class="w-full my-3 mb-5 border-2 border-white md:w-2/3 justify-self-center">
        <h1 class="my-3 text-lg font-semibold md:text-xl">PRODUCT DETAIL</h1>
        <div class="overflow-auto">
            <table class="w-full border border-collapse table-auto border-slate-400">
                <thead>
                    <tr class="bg-white">
                        <th class="py-3 border border-slate-300">No.</th>
                        <th class="border border-slate-300">Product Name</th>
                        <th class="border border-slate-300">Price</th>
                        <th class="border border-slate-300">Quantity</th>
                        <th class="border border-slate-300">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-slate-100">
                        <td class="py-5 text-center border border-slate-300">1</td>
                        <td class="px-1 border border-slate-300">{{ $product->name }}</td>
                        <td class="text-center border border-slate-300">Rp. {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td class="text-center border border-slate-300">{{ $quantity }}</td>
                        <td class="text-center border border-slate-300">Rp. {{ number_format($amount, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h1 class="my-3 text-lg font-semibold md:text-xl">PAYMENT METHOD</h1>
        <form action="/confirmation" method="POST" id="confirmationForm">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="{{ $quantity }}">
            <input type="hidden" name="total_amount" value="{{ $amount }}">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <div class="payment-method card">
                        <select class="w-full px-2 py-3 border-none rounded-md shadow-lg outline-none ring-0" name="payment_method" id="payment_method" required>
                            <option value="">Select payment</option>
                            <option value="cod">COD</option>
                            <option value="bank">Bank Transfer</option>
                        </select>
                    </div>
                    <div class="my-3 vendor card">
                        <select class="hidden w-full px-2 py-3 border-none rounded-md shadow-lg outline-none ring-0" name="provider" id="provider">
                            <option value="">Select Bank</option>
                            <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                            <option value="BCA">Bank Central Asia (BCA)</option>
                            <option value="BNI">Bank Negara Indonesia (BNI)</option>
                            <option value="BTN">Bank Tabungan Negara (BTN)</option>
                            <option value="Mandiri">Bank Mandiri</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="w-full text-center">
                <button type="button" class="w-full px-4 py-3 text-lg font-semibold text-white bg-green-600 md:w-2/3" id="successBtn">
                    <i class="fas fa-credit-card"></i> Confirm Payment
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="payment-success-modal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
    <div class="w-11/12 p-6 bg-white rounded-lg shadow-lg md:w-1/3">
        <div class="text-center">
            <i class="text-3xl text-green-600 fas fa-check-circle"></i>
            <h3 class="text-xl font-semibold text-green-500 md:text-2xl">Thank you for Your Order</h3>
            <p class="mt-4 text-sm font-semibold text-gray-600 md:text-lg">Thanks, Your payment has been successfully processed. Please wait for your order for the next 1-3 days!</p>
            <p class="mt-4 text-sm text-gray-600 md:text-base">Bandungmerch Admin</p>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function showPaymentSuccessModal() {
        const modal = document.getElementById('payment-success-modal');
        modal.classList.remove('hidden');
    }

    $('#payment_method').on('change', function() {
        const value = $(this).val();
        if (value == 'bank') {
            $('#provider').removeClass('hidden');
            $('#provider').attr('required', true);
        } else {
            $('#provider').addClass('hidden');
            $('#provider').val('');
        }
    });

    $('#successBtn').on('click', function() {
        if ($('#payment_method').val() == 'cod' || ($('#payment_method').val() == 'bank' && $('#provider').val() != '')) {
            $(this).attr('type', 'button');
            showPaymentSuccessModal();
            setTimeout(function() {
                $('#payment-success-modal').fadeOut(500, function() {
                    $('#confirmationForm').submit();
                });
            }, 2500);
        } else {
            $(this).attr('type', 'submit');
        }
    });
</script>
@endsection
