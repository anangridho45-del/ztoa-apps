<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ZtoA') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Custom Styles & Animations -->
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                animation: fadeInAnimation ease 1s;
                animation-iteration-count: 1;
                animation-fill-mode: forwards;
            }

            @keyframes fadeInAnimation {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            .nav-link-animate {
                transition: transform 0.3s ease, color 0.3s ease;
            }

            .nav-link-animate:hover {
                transform: translateY(-3px);
                color: #f0f0f0;
            }

            .flower {
                position: fixed;
                background-image: url('https://i.ibb.co/pdbcDkX/telang-flower.png');
                background-size: contain;
                background-repeat: no-repeat;
                width: 50px;
                height: 50px;
                pointer-events: none;
                animation-name: fall;
                animation-timing-function: linear;
                animation-iteration-count: infinite;
                z-index: 9999;
            }
            @keyframes fall {
                0% { transform: translateY(-10vh); }
                100% { transform: translateY(100vh); }
            }

            @keyframes slideInUp {
                0% {
                    transform: translateY(20px);
                    opacity: 0;
                }
                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .animate-slide-in-up {
                animation: slideInUp 0.8s ease-out forwards;
            }
        </style>

        @stack('styles') {{-- For page-specific styles --}}
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-800">
        <div x-data="{ open: false }" class="min-h-screen bg-[#F0F8FF]">
            <!-- Navbar -->
            <nav class="shadow-md" style="background-color: #8A2BE2;">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <!-- Logo -->
                        <div class="flex-shrink-0">
                            <a href="{{ route('home') }}" class="text-black text-xl font-bold hover:text-gray-200 nav-link-animate">Es Telang ZtoA</a>
                        </div>

                        <!-- Desktop Menu -->
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ route('home') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white px-3 py-2 rounded-md text-sm font-medium nav-link-animate"><i class="fas fa-home mr-1"></i>Home</a>
                                <a href="{{ route('menu') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white px-3 py-2 rounded-md text-sm font-medium nav-link-animate"><i class="fas fa-book-open mr-1"></i>Menu Produk</a>
                                <a href="{{ route('pemasaran.form') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white px-3 py-2 rounded-md text-sm font-medium nav-link-animate"><i class="fas fa-shopping-cart mr-1"></i>Pemasaran</a>
                                <a href="{{ route('team') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white px-3 py-2 rounded-md text-sm font-medium nav-link-animate"><i class="fas fa-users mr-1"></i>Our Team</a>
                            </div>
                        </div>

                        <!-- User Dropdown (Desktop) -->
                        <div class="hidden md:block">
                             @auth
                                <div x-data="{ dropdownOpen: false }" class="relative">
                                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center text-sm rounded-full text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                        <span class="mr-2">{{ Auth::user()->name }}</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-50">
                                        @if(Auth::user()->role == 'admin')
                                            <a href="{{ route('admin.pemesanan.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Manajemen Pesanan</a>
                                        @endif
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                Log Out
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('login') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white px-3 py-2 rounded-md text-sm font-medium nav-link-animate">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white px-3 py-2 rounded-md text-sm font-medium nav-link-animate">Register</a>
                                    @endif
                                </div>
                            @endauth
                        </div>

                        <!-- Mobile Menu Button -->
                        <div class="-mr-2 flex md:hidden">
                            <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-black hover:text-white hover:bg-[#6A0DAD] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                <span class="sr-only">Open main menu</span>
                                <svg :class="{'hidden': open, 'block': !open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <svg :class="{'hidden': !open, 'block': open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div :class="{'block': open, 'hidden': !open}" class="md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                        <a href="{{ route('home') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="fas fa-home mr-2"></i>Home</a>
                        <a href="{{ route('menu') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="fas fa-book-open mr-2"></i>Menu Produk</a>
                        <a href="{{ route('pemasaran.form') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="fas fa-shopping-cart mr-2"></i>Pemasaran</a>
                        <a href="{{ route('team') }}" class="text-black hover:bg-[#6A0DAD] hover:text-white block px-3 py-2 rounded-md text-base font-medium"><i class="fas fa-users mr-2"></i>Our Team</a>
                    </div>
                    <div class="pt-4 pb-3 border-t border-gray-700">
                        @auth
                            <div class="flex items-center px-5">
                                <div class="ml-3">
                                    <div class="text-base font-medium leading-none text-black">{{ Auth::user()->name }}</div>
                                    <div class="text-sm font-medium leading-none text-gray-300">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                            <div class="mt-3 px-2 space-y-1">
                                @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('admin.pemesanan.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-black hover:text-white hover:bg-[#6A0DAD]">Manajemen Pesanan</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-3 py-2 rounded-md text-base font-medium text-black hover:text-white hover:bg-[#6A0DAD]">
                                        Log Out
                                    </a>
                                </form>
                            </div>
                        @else
                            <div class="px-2 space-y-1">
                                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-black hover:text-white hover:bg-[#6A0DAD]">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-black hover:text-white hover:bg-[#6A0DAD]">Register</a>
                                @endif
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="py-4 sm:py-6 lg:py-8 animate-slide-in-up">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="text-white text-center py-6 mt-10" style="background-color: #6A0DAD;">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white text-black rounded-lg p-4">
                        <p class="text-lg font-semibold mb-2"><i class="fas fa-fan mr-2"></i>HAK CIPTA 2025 ZtoA</p>
                        <p class="text-sm mb-1">Alamat: Perumahan Gemuruh Griya Indah Blok K3 Rt04 Rw10, Kec. Bawang, Kab. Banjarnegara</p>
                        <p class="text-sm">Kontak: <a href="tel:+62895321088824" class="text-blue-600 hover:underline">+62 895 3210 88824</a> | <a href="mailto:ztoaminumantelang@gmail.com" class="text-blue-600 hover:underline">ztoaminumantelang@gmail.com</a></p>
                    </div>
                </div>
            </footer>
        </div>

                <script>
            document.addEventListener('DOMContentLoaded', function() {
                const body = document.body;
                const numFlowers = 20; // Number of flowers to generate
                const minSize = 30; // px
                const maxSize = 60; // px
                const minDuration = 8; // seconds
                const maxDuration = 15; // seconds
                const minDelay = 0; // seconds
                const maxDelay = 5; // seconds

                function createFlower() {
                    const flower = document.createElement('div');
                    flower.classList.add('flower');

                    const size = Math.random() * (maxSize - minSize) + minSize;
                    flower.style.width = `${size}px`;
                    flower.style.height = `${size}px`;

                    const startX = Math.random() * window.innerWidth;
                    flower.style.left = `${startX}px`;

                    const duration = Math.random() * (maxDuration - minDuration) + minDuration;
                    const delay = Math.random() * (maxDelay - minDelay) + minDelay;

                    flower.style.animationDuration = `${duration}s`;
                    flower.style.animationDelay = `${delay}s`;

                    body.appendChild(flower);

                    // Remove flower after animation ends to prevent DOM clutter
                    flower.addEventListener('animationend', () => {
                        flower.remove();
                    });
                }

                // Generate flowers periodically
                setInterval(createFlower, 1000); // Create a new flower every second
            });
        </script>

        @stack('scripts')
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @stack('modals')
    </body>
</html>