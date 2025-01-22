@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <div class="contact-section">
        <div class="w-full h-screen bg-center bg-cover hero" style="background-image: url('{{ asset('assets/bdm.jpg') }}');">
            <div class="flex flex-col items-center justify-center h-full text-center text-white bg-black bg-opacity-50">
                <h1 class="text-4xl font-bold uppercase fade-in-slide-up">Contact Us</h1>
            </div>
        </div>

    <!-- Content Section -->
    <div class="container grid grid-cols-1 gap-8 px-6 py-12 mx-auto md:grid-cols-2">
        <!-- Contact Information -->
        <div>
            <h2 class="mb-6 text-2xl font-bold">Warehouse</h2>
            <p class="mb-4 italic text-[#a50e13]">
                Jl. Hasan Ali No.61, <br>
                Dungus Cariang, <br>
                Kec. Andir, <br>
                Kota Bandung, <br>
                Jawa Barat 40183
            </p>
            <h2 class="mt-8 mb-4 text-2xl font-bold">Collaborations</h2>
            <p class="mb-1 text-[#a50e13]">bandungmerchstore@gmail.com</p>
            <p class="text-gray-700">+62 812-3462-3300 (Ray)</p>
            <p class="text-gray-700">+62 851-7114-0328 (Rey)</p>
        </div>
        <!-- Contact Form -->
        <div class="p-6 bg-[#c0bdbb] rounded-lg shadow-lg">
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-bold">Email*</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Your Email Address" required>
                </div>
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-bold">Name*</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Your Name" required>
                </div>

                <div class="mb-4">
                    <label for="message" class="block mb-2 text-sm font-bold">Message*</label>
                    <textarea id="message" name="message" rows="4" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Enter Your Message" required></textarea>
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-[#a50e13] rounded hover:bg-red-700">Submit</button>
            </form>
        </div>
    </div>

@endsection
