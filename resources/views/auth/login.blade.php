@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="flex flex-col items-center justify-center w-full h-screen min-h-screen bg-center bg-cover " style="">
    <h1 class="mb-10 text-3xl font-extrabold text-center text-black">SIGN UP NOW AND ENJOY ALL OUR SERVICES!</h1>
    <div class="flex flex-col w-11/12 max-w-screen-lg overflow-hidden bg-white rounded-lg shadow-lg md:flex-row">
        <div class="w-full md:w-1/2 p-10 bg-[#f5f5f5] flex flex-col justify-between">
            <div>
                {{-- alert --}}
                @if (session('info'))
                    <div id="alert" class="flex items-center justify-between bg-red-400 text-white p-4 m-4">
                        <span>{{ session('info') }}</span>
                        <button id="dismissBtn" class="text-white font-bold">&times;</button>
                    </div>
                @endif
                {{-- alert --}}
                <h2 class="mb-2 text-2xl font-bold text-center text-black">Hello!</h2>
                <p class="mb-6 text-center text-gray-700 underline">
                    <a href="#" class="text-[#a50e13] hover:underline">Sign into your account.</a>
                </p>
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block mb-2 font-semibold text-gray-700">Email*</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-600" placeholder="Your Email Address" required>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 font-semibold text-gray-700">Password*</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-600" placeholder="Your Password" required>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="mr-2">
                            <span class="text-gray-700">Remember me</span>
                        </label>
                        <a href="#" class="text-[#a50e13] hover:underline">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full bg-[#d9d9d9] text-[#a50e13] py-3 rounded hover:bg-[#c0bdbb] font-bold">
                        SIGN IN
                    </button>
                </form>
            </div>
            <p class="mt-4 text-center text-gray-700">
                Don’t have an account? <a href="/register" class="text-[#a50e13] hover:underline">Create</a>
            </p>
        </div>
        <div class="w-full md:w-1/2 bg-[#c0bdbb] text-black p-10 flex flex-col justify-center items-center">
            <h2 class="mb-4 text-3xl font-bold text-[#a50e13]">Welcome Back!</h2>
            <p class="text-center">
                Selamat datang kembali! Akses koleksi merchandise Bandung favorit Anda dan tetap terupdate dengan penawaran terbaru.
            </p>
        </div>
    </div>
</div>

@endsection


@section('script')
    <script>
        const dismissBtn = document.getElementById('dismissBtn');
        const alert = document.getElementById('alert');

        dismissBtn.addEventListener('click', () => {
        alert.classList.add('hidden');
        });
    </script>
@endsection
