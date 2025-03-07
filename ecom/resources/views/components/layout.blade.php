<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ShopEasy - Your one-stop online shopping destination">
    <title>ShopEasy - Your Online Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-red': '#e31837',
                        'light-red': '#ff1f4b',
                        'dark-red': '#c41430',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins min-h-screen flex flex-col bg-gray-50">
    {{-- Navigation --}}
    <nav class="bg-white px-[5%] py-3 flex justify-between items-center text-gray-800 sticky top-0 z-50 shadow-sm">
        <a href="/" class="text-2xl font-bold hover:text-primary-red transition-colors duration-300">
            <i class="fas fa-shopping-bag mr-2 text-primary-red"></i>ShopEasy
        </a>
        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="hover:text-primary-red transition-colors duration-300"><i class="fas fa-home mr-1"></i> Home</a>
            <a href="#" class="hover:text-primary-red transition-colors duration-300"><i class="fas fa-tags mr-1"></i> Categories</a>
            <a href="/cart" class="hover:text-primary-red transition-colors duration-300"><i class="fas fa-shopping-cart mr-1"></i> Cart</a>
            @auth
            <div x-data="{ open: false }" class="relative group">
                <button @click="open = !open" class="flex items-center space-x-2 bg-primary-red text-white hover:bg-light-red px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105">
                    <span>{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down text-sm"></i>
                </button>
                <div class="relative">
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 border border-gray-100" 
                         x-show="open"
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         style="display: none;">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary-red transition-colors duration-300">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <a href="{{ route('login') }}" class="bg-primary-red text-white px-6 py-2 rounded-lg hover:bg-light-red transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-sign-in-alt mr-1"></i> Login
            </a>
            @endauth
        </div>
        <button class="md:hidden text-gray-800 hover:text-primary-red transition-colors duration-300">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </nav>

    <main class="container mx-auto px-4 py-8 flex-grow">
        {{$slot}}
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-12 px-[5%]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-7xl mx-auto">
            <div>
                <h3 class="text-xl font-bold mb-6 border-b border-gray-700 pb-2">About Us</h3>
                <p class="text-gray-400 leading-relaxed">Your trusted online shopping destination for quality products at great prices.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-6 border-b border-gray-700 pb-2">Quick Links</h3>
                <ul class="space-y-3 text-gray-400">
                    <li><a href="#" class="hover:text-white hover:translate-x-2 transition-all duration-300 inline-block">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white hover:translate-x-2 transition-all duration-300 inline-block">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white hover:translate-x-2 transition-all duration-300 inline-block">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-6 border-b border-gray-700 pb-2">Follow Us</h3>
                <div class="flex space-x-6">
                    <a href="#" class="text-2xl hover:text-primary-red transition-transform duration-300 hover:scale-125"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl hover:text-primary-red transition-transform duration-300 hover:scale-125"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-2xl hover:text-primary-red transition-transform duration-300 hover:scale-125"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} ShopEasy. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
