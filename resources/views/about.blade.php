@extends('layouts.app')

@section('content')
<div class="about-section">
    <div class="w-full h-screen bg-center bg-cover hero" style="background-image: url('{{ asset('assets/bdm.jpg') }}');">
        <div class="flex flex-col items-center justify-center h-full text-center text-white bg-black bg-opacity-50">
            <h1 class="text-4xl font-bold uppercase fade-in-slide-up">About Us</h1>
        </div>
    </div>

    <div class="mt-32">
    <!-- Content -->
        <div class="grid grid-cols-1 gap-8 px-4 md:grid-cols-2 md:px-12">
            <!-- Section 1 -->
            <div class="flex items-center justify-center">
                <div class="relative">
                    <img src="{{ asset('assets/owner.jpg') }}" alt="Owner's Image" class="object-cover w-full rounded-lg shadow-md h-80">
                    <div class="absolute inset-0 flex items-center justify-center">
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="flex flex-col justify-center">
                <h3 class="mb-4 text-2xl font-bold">Om Pian</h3>
                <p class="leading-relaxed text-gray-700">
                    Pemilik dari Bandung Merch Store, sebuah toko aksesoris yang menawarkan beragam produk menarik seperti bandana, ikat pinggang, dan botol minum. Berkat semangat dan kerja kerasnya, Om Pian berhasil membangun bisnis ini dari nol hingga sukses seperti sekarang.
                    Lahir pada 19 April 1989, Om Pian kini menetap di Bandung, kota yang penuh inspirasi dan kreativitas, tempat ia terus berinovasi untuk memenuhi kebutuhan aksesoris masyarakat dengan kualitas terbaik.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 px-4 my-12 md:grid-cols-2 md:px-12">
            <!-- Section 3 -->
            <div class="flex flex-col justify-center ">
                <h3 class="mb-4 text-2xl font-bold">Bandung Merch Store</h3>
                <p class="leading-relaxed text-gray-700">
                    Bandung Merch Store adalah toko online yang menyediakan berbagai macam merchandise unik dan berkualitas. Mulai dari bandana, ikat pinggang, botol minum, hingga aksesori lainnya, setiap produk dirancang dengan penuh cinta dan perhatian terhadap detail. Berkat semangat dan kerja keras Om Pian, toko ini telah menjadi pilihan utama bagi mereka yang mencari aksesoris menarik dengan kualitas terbaik.
                </p>
            </div>

            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/logo/IMG-20240929-WA0016.jpg') }}" alt="Bandung Merch Logo" class="object-contain h-64 rounded-lg">
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
</div>
@endsection
