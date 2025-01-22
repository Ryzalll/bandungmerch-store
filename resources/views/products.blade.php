@extends('layouts.app')

@section('content')
<div class="w-full" style="margin-top: 100px !important">
    @if(session('info'))
        <div class="flex justify-between w-2/3 p-3 px-5 mb-4 text-xl text-green-900 bg-green-300 justify-self-center alert">
            <span>{{ session('info') }}</span>
            <span class="close-alert">
                <i class="far fa-times-circle"></i>
            </span>
        </div>
    @endif

     <h2 class="mb-8 text-3xl font-bold text-center">
        {{ $title }}
    </h2>

    <!-- Categories -->
    <div class="flex flex-wrap justify-center gap-4 mb-8 px-4">
    @foreach ($categories as $category)
        <a href="{{ url('/products') }}?category={{ $category }}"
           class="px-4 py-2 text-center rounded-md flex-auto sm:flex-initial {{ request('category') === $category || (!request('category') && $category === 'ALL Product') ? 'bg-[#a50e13] text-white' : 'bg-gray-300 text-gray-800' }}">
           {{ $category }}
        </a>
    @endforeach
</div>


    <div class="grid grid-cols-1 mb-11 gap-8 px-4 sm:grid-cols-2 lg:grid-cols-3 md:px-12 mobile:flex mobile:gap-4 mobile:overflow-x-auto">
        <!-- Product -->
        @forelse ($products as $product)
            <div class="flex-shrink-0 p-4 transition bg-white border rounded-lg shadow-md mobile:w-72">
                <img src="{{ asset('storage/products/' . $product->photo ) }}" alt="{{ $product->name }}" class="object-cover w-full mb-4 rounded-md h-55" />
                <h3 class="text-lg font-semibold text-center uppercase">{{ $product->name }}</h3>
                <p class="text-center text-gray-600">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                <div class="my-2 text-xl text-center text-yellow-400">★★★★★</div>
                <div class="flex justify-center">
                    <a class="px-5 py-2 bg-red-900 text-white rounded-md font-semibold cursor-pointer @auth openModalBtn @endauth" @auth data-id="{{ $product->id }}" @else href="/login" @endauth>
                        <i class="fas fa-cart-shopping"></i> Buy Now
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No products available.</p>
        @endforelse
    </div>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="bg-white rounded-lg p-4
        w-10/12 md:w-2/3 lg:w-1/2 xl:w-1/3
        max-h-[90vh] overflow-y-auto">
        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
            <div>
                <img src="" alt="Product Image" class="object-cover w-full mb-4 rounded-md h-60" />
            </div>
            <div>
                <div class="flex justify-end">
                    <span id="closeModalBtn" class="px-2 py-1 text-white bg-gray-600 rounded-md cursor-pointer">close (x)</span>
                </div>
                <h2 class="mb-4 text-xl font-semibold uppercase product-title">PRODUCT NAME</h2>
                <h4 class="mb-2 product-detail">Product description goes here...</h4>
                <p class="mb-2 text-lg text-gray-600">Price: Rp <span class="product-price">29.000</span></p>
                <p class="mb-4 text-lg text-gray-600">Stock: <span class="product-stock">100</span></p>
                <div class="mb-4 text-lg text-black">
                    Product Rating: <span class="text-yellow-400">★★★★★</span>
                </div>
                <hr class="my-5">
                <div class="grid grid-cols-2 mb-3">
                    <div>Quantity</div>
                    <div class="flex items-center">
                        <span class="px-2 py-1 bg-gray-300 cursor-pointer btnMinus">-</span>
                        <span class="px-3 py-1 bg-gray-100 btnPcs">1</span>
                        <span class="px-2 py-1 bg-gray-300 cursor-pointer btnPlus">+</span>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div>Total Amount</div>
                    <div class="font-semibold text-red-600" id="total_amount">Rp 29.000,00</div>
                </div>
                <hr class="my-5">
                <form class="flex flex-col justify-end gap-2" action="/payment" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <input type="hidden" name="product_quantity" id="product_quantity" value="1">
                    <button type="submit"
                        class="w-full px-4 py-2 font-medium text-center text-white bg-green-600 rounded hover:bg-green-700 cartBtn" onclick="return confirm('Are you sure want to add this product to your cart?')">
                        <i class="fas fa-cart-plus"></i> Add to Cart
                    </button>
                    <button type="submit"
                        class="w-full px-4 py-2 font-medium text-center text-white bg-red-600 rounded hover:bg-red-700">
                        BUY NOW
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection





@section('script')
<script>
    const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
        }).format(number);
    }

    const openModalBtn = document.querySelectorAll('.openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('modal');

    openModalBtn.forEach(function(btn){
        btn.addEventListener('click', () => {
            const id = event.target.getAttribute('data-id');
            modal.classList.remove('hidden');
            const totalPcs = $('#modal .btnPcs');
            totalPcs.html('1');
            const cartButton = $('#modal .cartBtn');
            $.get('/products/' + id, function(data){
                $('#product_id').val(data.id);
                $('#modal img').attr('src', '/storage/products/' + data.photo);
                $('#modal .product-title').html(data.name);
                $('#modal .product-detail').html(data.description);
                $('#modal .product-price').html(rupiah(data.price));
                $('#modal .product-stock').html(data.stock);
                let pcs = parseInt($('.btnPcs').html());
                $('#modal #total_amount').html(rupiah(pcs*data.price))
                $('.btnMinus').on('click', function(){
                    if(pcs > 1){
                        --pcs;
                    }
                    $('.btnPcs').html(pcs);
                    $('#modal #total_amount').html(rupiah(pcs*data.price));
                    $('#product_quantity').val(pcs);
                })
                $('.btnPlus').on('click', function(){
                    pcs++;
                    $('.btnPcs').html(pcs);
                    $('#modal #total_amount').html(rupiah(pcs*data.price));
                    $('#product_quantity').val(pcs);
                })

                cartButton.on('click', function(){
                    $('#modal form').attr('action', '/cart');
                })
            });

        });
    });

    closeModalBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    $('.close-alert').on('click', function(){
        $('.alert').addClass('hidden');
    })
  </script>
@endsection
