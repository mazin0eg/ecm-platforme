<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEasy - Your Online Shopping Destination</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Previous head content remains the same -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-red': '#e31837',
                        'light-red': '#ff1f4b',
                        'dark-red': '#c41430',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins min-h-screen flex flex-col bg-gray-50">
    {{-- Navigation --}}
    <nav class="bg-white px-[5%] py-4 flex justify-between items-center text-gray-800 sticky top-0 z-50 shadow-sm">
        <a href="/" class="text-2xl font-bold text-primary-red hover:text-dark-red transition-colors">
            <i class="fas fa-shopping-bag mr-2"></i>ShopEasy
        </a>
        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="hover:text-primary-red transition-colors"><i class="fas fa-home mr-1"></i> Home</a>
            <a href="/add_product" class="hover:text-primary-red transition-colors"><i class="fas fa-plus mr-1"></i> Add product</a>
            <a href="/categories" class="hover:text-primary-red transition-colors"><i class="fas fa-tags mr-1"></i> Categories</a>
            <a href="/cart" class="hover:text-primary-red transition-colors"><i class="fas fa-shopping-cart mr-1"></i> Cart</a>
            <div x-data="{ open: false }" class="relative group">
                <button @click="open = !open" class="flex items-center space-x-2 bg-primary-red text-white hover:bg-light-red px-4 py-2 rounded-full transition-colors">
                    <span>{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down text-sm"></i>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                    <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <a href="/orders" class="block px-4 py-2 hover:bg-gray-100">Orders</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Mobile menu button remains the same -->
    </nav>

    {{-- Hero Section --}}
    <div class="h-[70vh] bg-[url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da')] bg-cover bg-center relative">
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/60"></div>
        <div class="relative z-10 h-full flex flex-col items-center justify-center text-white text-center px-4 max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">Welcome to ShopEasy</h1>
            <p class="text-xl md:text-2xl mb-10 text-gray-200">Discover Amazing Products at Great Prices</p>
            <button class="bg-primary-red hover:bg-light-red px-10 py-4 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg text-lg">
                <i class="fas fa-shopping-cart mr-2"></i>Shop Now
            </button>
        </div>
    </div>

    {{-- Featured Products --}}
    <section class="px-[5%] py-20 flex-grow max-w-7xl mx-auto">
        <h2 class="text-4xl font-bold mb-12 text-center">
            <span class="text-primary-red">Featured</span> Products
        </h2>
        {{-- filepath: /home/mazine/ecm-platforme/ecom/resources/views/home.blade.php --}}
...
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach($products as $product)
        <a href="{{ route('products.show', $product->id) }}">
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="relative group">
                    {{-- Use "asset('storage/products/'.$product->image)" if you’re storing images in "public/products" --}}
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}"
                         class="w-full h-56 object-cover mb-6 rounded-xl">
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-xl">
                        <button class="bg-white text-primary-red px-6 py-3 rounded-full hover:bg-primary-red hover:text-white transition-colors">
                            Quick View
                        </button>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-3">{{ $product->name }}</h3>
                <div class="flex items-center mb-3">    
                    @for ($j = 1; $j <= 5; $j++)
                        <i class="fas fa-star text-yellow-400"></i>
                    @endfor
                </div>
                <p class="text-primary-red font-bold text-2xl mb-4">${{ number_format($product->price, 2) }}</p>
                <button class="bg-primary-red text-white hover:bg-light-red px-6 py-3 rounded-full transition-colors w-full text-lg">
                    <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                </button>
            </div>
        </a>
    @endforeach
</div>
...
    </section>

    {{-- Footer remains mostly the same but with updated styling --}}
    <footer class="bg-gray-900 text-white py-12 px-[5%]">
        <!-- Previous footer content with minor padding/spacing adjustments -->
    </footer>
</body>
</html>
