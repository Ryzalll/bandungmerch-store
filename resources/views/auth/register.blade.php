@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="flex flex-col items-center justify-center w-full min-h-screen bg-center bg-cover">
    <h1 class="mb-10 text-3xl font-extrabold text-center text-black">SIGN UP NOW AND ENJOY ALL OUR SERVICES!</h1>
    <div class="flex flex-col w-11/12 max-w-screen-lg overflow-hidden bg-white rounded-lg shadow-lg md:flex-row my-3">
        <div class="flex flex-col justify-between w-full p-10 bg-gray-100 md:w-1/2 mb-3">
            <div>
                <h2 class="text-2xl font-bold text-[#a50e13] mb-2">Hello, Sob!</h2>
                <p class="mb-6 text-gray-700">
                    Join us now by filling out the form below.
                </p>
                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block font-semibold text-gray-700">Name*</label>
                        <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 @error('name') border border-red-600 focus:ring-0 @enderror" placeholder="Your Full Name" value="{{ old('name') }}">
                        @error('name')
                            <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block font-semibold text-gray-700">Username*</label>
                        <input type="text" id="username" name="username" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 @error('username') border border-red-600 focus:ring-0 @enderror" placeholder="Your username" value="{{ old('username') }}">
                        @error('username')
                            <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block font-semibold text-gray-700">Address*</label>
                        <input type="text" id="address" name="address" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 @error('address') border border-red-600 focus:ring-0 @enderror" placeholder="Your address" value="{{ old('address') }}">
                        @error('address')
                            <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="telephone" class="block font-semibold text-gray-700">Telephone*</label>
                        <input type="number" id="telephone" name="telephone" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 @error('telephone') border border-red-600 focus:ring-0 @enderror" placeholder="Your telephone" value="{{ old('telephone') }}">
                        @error('telephone')
                            <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block font-semibold text-gray-700">Email*</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 @error('email') border border-red-600 focus:ring-0 @enderror" placeholder="Your Email Address" value="{{ old('email') }}">
                        @error('email')
                            <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block font-semibold text-gray-700">Password*</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 @error('password') border border-red-600 focus:ring-0 @enderror" placeholder="Your Password">
                        @error('password')
                            <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block font-semibold text-gray-700">Confirm Password*</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 @error('password_confirmation') border border-red-600 focus:ring-0 @enderror" placeholder="Confirm Your Password">
                        @error('password_confirmation')
                            <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="flex items-center text-gray-700">
                            <input type="checkbox" name="terms" class="mr-2">
                            <span>I’ve read and agree to <a href="#" class="text-red-600 hover:underline">Terms & Conditions</a></span>
                        </label>
                    </div>
                    <button type="submit" class="w-full bg-[#d9d9d9] text-[#a50e13] py-3 rounded hover:bg-[#c0bdbb] font-bold">
                        CREATE ACCOUNT
                    </button>
                </form>
            </div>
            <p class="mt-4 text-center text-gray-700">
                Already have an account? <a href="/login" class="text-red-600 hover:underline">Sign in</a>
            </p>
        </div>
        <!-- Right Panel: Welcome Message -->
        <div class="w-full md:w-1/2 bg-[#c0bdbb] p-10 flex flex-col justify-center items-center text-black">
            <h2 class="text-3xl font-bold mb-4 text-[#a50e13]">Glad to see You!</h2>
            <p class="text-center">
                Senang melihat Anda! Bergabunglah dengan komunitas merchandise Bandung kami dan jadilah yang pertama tahu tentang produk baru dan penawaran eksklusif.
            </p>
        </div>
    </div>
</div>
@endsection
