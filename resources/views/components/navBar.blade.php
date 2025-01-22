<nav id="navbar" class="fixed top-0 left-0 z-40 w-full transition-transform duration-300 bg-[#c0bdbb] shadow-md">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Logo -->
        <a href="/">
            <img src="{{ asset('assets/bandung merch.png') }}" alt="Logo Bandung Merch" class="w-40">
        </a>

        <!-- Navbar Links -->
        <ul class="hidden lg:flex justify-center flex-grow gap-10 text-lg font-semibold text-[#a50e13]">
            <li><a href="/">Home</a></li>
            <li><a href="/products">Our Products</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
        @auth
        <h5 class="me-3">Hi {{ auth()->user()->name }} !</h5>
        <a href="/cart" class="relative inline-block text-2xl font-semibold text-red-900 me-4">
            <i class="fas fa-cart-plus"></i>
            @if(isset($notif) && $notif > 0)
            <span class="absolute top-0 right-0 inline-block px-2 py-1 text-xs font-semibold text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">
                {{ $notif }}
              </span>
            @endif
        </a>
        <a  href="/logout" class="px-5 py-2 font-semibold text-white bg-red-900 rounded-lg lg:block">
            <i class="fas fa-user"></i> Sign out
        </a>
        @else
        <a  href="/login" class="px-5 py-2 font-semibold text-white bg-red-900 rounded-lg lg:block">
            <i class="fas fa-user"></i> Sign in
        </a>
        @endauth



        <!-- Mobile Menu Toggle -->
        <button id="mobile-menu-toggle" class="block lg:hidden focus:outline-none">
            <div id="hamburger-icon" class="space-y-1.5 transition-transform duration-300">
                <span class="block w-6 h-0.5 bg-[#a50e13] transition-transform origin-center"></span>
                <span class="block w-6 h-0.5 bg-[#a50e13] transition-transform"></span>
                <span class="block w-6 h-0.5 bg-[#a50e13] transition-transform origin-center"></span>
            </div>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden bg-gray-200 lg:hidden">
        <ul class="flex flex-col items-center gap-4 py-4 text-lg font-semibold text-[#a50e13]">
            <li><a href="/">Home</a></li>
            <li><a href="/products">Shop</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>
</nav>
