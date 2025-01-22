@extends('layouts.app')

@section('content')
<div class="w-full h-screen bg-center bg-cover hero" style="background-image: url('{{ asset('assets/bdm.jpg') }}');">
    <div class="flex flex-col items-center justify-center h-full text-center text-white bg-black bg-opacity-50">
        <h1 class="text-lg font-bold tracking-widest uppercase md:text-2xl fade-in-slide-up">
            Selamat Datang di Bandung Merch
        </h1>
        <p class="mt-4 text-2xl font-bold leading-snug md:text-5xl fade-in-slide-up">
            Lengkapi penampilanmu dengan aksesoris <br /> Bandung Merch
        </p>
        <a href="/products"
            class="mt-6 bg-white hover:bg-[#c0bdbb] text-[#a50e13] px-8 py-3 rounded-md font-semibold transition duration-300 transform hover:scale-105 shadow-lg fade-in-slide-up">
            Shop Now
        </a>
    </div>
</div>

<div class="py-12 best-selling">
    <h2 class="mb-8 text-3xl font-bold text-center">Best Selling</h2>
    <div class="grid grid-cols-1 gap-8 px-4 md:grid-cols-3 md:px-12">
        <!-- Product 1 -->
        <div class="p-4 transition duration-500 transform translate-y-10 bg-white border rounded-lg shadow-md opacity-0 product-card">
            <img src="{{ asset('assets/products/belt thrasher.jpeg') }}" alt="Belt Thrasher" class="object-cover w-full mb-4 rounded-md h-55"  />
            <h3 class="text-lg font-semibold text-center">BELT - THRASHER</h3>
            <p class="text-center text-gray-600">Rp 29.900</p>
            <div class="my-2 text-center text-yellow-400">★★★★★</div>
        </div>

        <!-- Product 2 -->
        <div class="p-4 transition duration-500 transform translate-y-10 bg-white border rounded-lg shadow-md opacity-0 product-card">
            <img src="{{ asset('assets/products/bandana hitam.jpeg') }}" alt="Bandana Thrasher"class="object-cover w-full mb-4 rounded-md h-55"  />
            <h3 class="text-lg font-semibold text-center">BANDANA - THRASHER</h3>
            <p class="text-center text-gray-600">Rp 29.900</p>
            <div class="my-2 text-center text-yellow-400">★★★★★</div>
        </div>

        <!-- Product 3 -->
        <div class="p-4 transition duration-500 transform translate-y-10 bg-white border rounded-lg shadow-md opacity-0 product-card">
            <img src="{{ asset('assets/products/tumbler thrasher.jpeg') }}" alt="Bottle Thrasher" class="object-cover w-full mb-4 rounded-md h-55"  />
            <h3 class="text-lg font-semibold text-center">BOTTLE - THRASHER</h3>
            <p class="text-center text-gray-600">Rp 29.900</p>
            <div class="my-2 text-center text-yellow-400">★★★★★</div>
        </div>
    </div>
</div>

<div class="mt-8 text-center">
    <a href="/products" class="mt-6 bg-white hover:bg-[#c0bdbb] text-[#a50e13] px-6 py-3 rounded font-semibold">
        Shop Now
    </a>
</div>

<div class="py-12 bg-gray-100 about-section">
    <h2 class="mb-8 text-3xl font-bold text-center">ABOUT</h2>
    <div class="grid grid-cols-1 gap-8 px-4 md:grid-cols-2 md:px-12">
        <!-- Card 1 -->
        <div class="overflow-hidden transition duration-300 transform bg-white rounded-lg shadow-md hover:scale-105 hover:shadow-lg">
            <div class="bg-gray-300 h-72">
                <img src="{{ asset('assets/bandung merch.png') }}" alt="Bandung Merch Logo" class="object-contain w-full h-full">
            </div>
            <div class="p-6">
                <h3 class="mb-2 text-xl font-bold">ABOUT BANDUNG MERCH STORE</h3>
                <p class="mb-4 text-gray-600">Selamat datang di Bandung Merch Store!</p>
                <a href="/about"
                    class="px-4 py-2 font-semibold text-red-600 transition duration-300 bg-[#c0bdbb] rounded-md hover:bg-gray-300">
                    More Info
                </a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="overflow-hidden transition duration-300 transform bg-white rounded-lg shadow-md hover:scale-105 hover:shadow-lg">
            <div class="bg-gray-300 h-72">
                <img src="{{ asset('assets/own.jpg') }}" alt="Owner's Image" class="object-cover w-full h-full">
            </div>
            <div class="p-6">
                <h3 class="mb-2 text-xl font-bold">ABOUT THE OWNER</h3>
                <p class="mb-4 text-gray-600">Halo! Saya Om Pian, pendiri Bandung Merch Store.</p>
                <a href="/about"
                    class="px-4 py-2 font-semibold text-red-600 transition duration-300 bg-[#c0bdbb] rounded-md hover:bg-gray-300">
                    More Info
                </a>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col items-center mt-12">
    <h1 class="relative w-full text-4xl font-bold text-center text-black">
        <span class="absolute inset-0 text-gray-400 translate-x-2 translate-y-2 blur-sm">
            Follow Us On Instagram
        </span>
        <span class="relative">Follow Us On Instagram</span>
    </h1>

    <a href="https://www.instagram.com/bandungmerch_store" target="_blank" class="w-full mt-8">
        <img src="{{ asset('assets/desain ig.png') }}" alt="Instagram Image"
             class="w-full h-auto transition-transform duration-300 rounded-lg shadow-lg hover:scale-105">
    </a>
    <a cla href="https://www.instagram.com/bandungmerch_store" target="_blank"
       class=" inline-block px-4 py-2 my-16 bg-[#c0bdbb] text-[#a50e13] font-semibold rounded-md shadow-md hover:bg-gray-300 transition duration-300">
        @bandungmerch_store
    </a>
</div>


@endsection
