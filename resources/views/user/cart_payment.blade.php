@extends('layouts.app')

@section('content')
<div class="flex justify-center px-4 sm:px-0">
    <div class="grid w-full p-4 mb-5 rounded-lg shadow-lg sm:w-3/4 md:w-2/3 bg-slate-200" style="margin-top: 100px">
        <div class="flex justify-center w-full mb-2">
            <img src="{{ asset('assets/bandung merch.png') }}" alt="Logo Bandung Merch" class="w-32 sm:w-48">
        </div>
        <h1 class="text-xl text-center sm:text-3xl">
            <i class="text-green-500 fas fa-check-circle"></i>
            PAYMENT CONFIRMATION
        </h1>
        <hr class="w-full mx-auto my-3 mb-5 border-2 border-white sm:w-2/3">
        <h1 class="my-3 text-base font-semibold sm:text-xl">PRODUCT DETAIL</h1>
        <div class="overflow-x-auto">
            <table class="w-full border border-collapse table-auto border-slate-400">
                <thead>
                    <tr class="bg-white">
                        <th class="py-3 text-xs border sm:text-sm border-slate-300">No.</th>
                        <th class="text-xs border sm:text-sm border-slate-300">Product Name</th>
                        <th class="text-xs border sm:text-sm border-slate-300">Price</th>
                        <th class="text-xs border sm:text-sm border-slate-300">Quantity</th>
                        <th class="text-xs border sm:text-sm border-slate-300">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr class="text-xs bg-slate-100 sm:text-sm">
                            <td class="py-5 text-center border border-slate-300">{{ $key + 1 }}</td>
                            <td class="px-1 border border-slate-300">{{ $product->name }}</td>
                            <td class="text-center border border-slate-300">{{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="text-center border border-slate-300">{{ $quantity[$key] }}</td>
                            <td class="text-center border border-slate-300">{{ number_format($product->price * $quantity[$key], 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr class="text-white bg-red-400">
                        <td class="py-5 font-semibold text-center border border-slate-300" colspan="4">Total Amount</td>
                        <td class="font-semibold text-center">Rp. {{ number_format($total_amount, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h1 class="my-3 text-base font-semibold sm:text-xl">PAYMENT METHOD</h1>
        <form action="/cartconfirmation" method="POST" id="confirmationForm">
            @csrf
            <input type="hidden" name="total_amount" value="{{ $total_amount }}">
            @foreach ($products as $key => $product)
                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                <input type="hidden" name="quantity[]" value="{{ $quantity[$key] }}">
            @endforeach
            <div class="grid items-center grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <div class="payment-method card">
                        <select class="w-full px-2 py-3 text-xs rounded-md shadow-lg outline-none sm:text-sm" name="payment_method" id="payment_method" required>
                            <option value="">Select payment</option>
                            <option value="cod">COD</option>
                            <option value="bank">Bank Transfer</option>
                        </select>
                    </div>
                    <div class="my-3 vendor card">
                        <select class="hidden w-full px-2 py-3 text-xs rounded-md shadow-lg outline-none sm:text-sm" name="provider" id="provider">
                            <option value="">Select Bank</option>
                            <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                            <option value="BCA">Bank Central Asia (BCA)</option>
                            <option value="BNI">Bank Negara Indonesia (BNI)</option>
                            <option value="BTN">Bank Tabungan Negara (BTN)</option>
                            <option value="Mandiri">Bank Mandiri</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="button" class="w-full p-3 text-sm font-semibold text-white bg-green-600 rounded-md sm:w-2/3 sm:p-5 sm:text-xl" id="successBtn">
                        <i class="fas fa-credit-card"></i> Confirm Payment
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div id="payment-success-modal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
    <div class="w-full p-6 bg-white rounded-lg shadow-lg sm:w-2/3 md:w-1/2">
        <div class="text-center">
            <i class="text-3xl text-green-600 fas fa-check-circle"></i>
            <h3 class="text-xl font-semibold text-green-500 sm:text-2xl">Thank you for Your Order</h3>
            <p class="mt-4 text-sm font-semibold text-gray-600 sm:text-lg">Thanks, Your payment has been successfully processed. Please wait for your order for the next 1-3 days!</p>
            <p class="mt-4 text-xs text-gray-600 sm:text-sm">Bandungmerch Admin</p>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    function showPaymentSuccessModal() {
        const modal = document.getElementById('payment-success-modal');
        modal.classList.remove('hidden'); // Menampilkan modal dengan menghapus class 'hidden'
    }

    // Event listener untuk perubahan metode pembayaran
    $('#payment_method').on('change', function () {
        const value = $(this).val();

        if (value === 'bank') {
            $('#provider').removeClass('hidden').attr('required', true); // Tampilkan dropdown bank dan buat required
        } else {
            $('#provider').addClass('hidden').val('').attr('required', false); // Sembunyikan dropdown bank
        }
    });

    // Event listener untuk tombol sukses
    $('#successBtn').on('click', function () {
        const paymentMethod = $('#payment_method').val();
        const providerSelected = $('#provider').val() !== '';

        if (paymentMethod === 'cod' || (paymentMethod === 'bank' && providerSelected)) {
            $(this).attr('type', 'button'); // Ubah type tombol untuk mencegah form langsung submit
            showPaymentSuccessModal();

            setTimeout(function () {
                $('#payment-success-modal').fadeOut(500, function () {
                    $('#confirmationForm').submit(); // Submit form setelah modal ditutup
                });
            }, 2500); // Modal muncul selama 2.5 detik
        } else {
            $(this).attr('type', 'submit'); // Kembalikan type tombol ke submit jika kondisi tidak terpenuhi
        }
    });
</script>

@endsection
