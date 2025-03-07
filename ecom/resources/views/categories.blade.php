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
        {{-- Category Filters --}}
        <div class="bg-white border-b">
            <div class="px-[5%] py-4 max-w-7xl mx-auto flex items-center space-x-4 overflow-x-auto">
                <button class="px-4 py-2 rounded-full bg-primary-red text-white hover:bg-light-red">All Categories</button>
                <button class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200">Electronics</button>
                <button class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200">Fashion</button>
                <button class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200">Home & Living</button>
                <button class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200">Books</button>
                <button class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200">Sports</button>
            </div>
        </div>

        {{-- Products Grid --}}
        <main class="px-[5%] py-12 flex-grow max-w-7xl mx-auto">
            {{-- Category Section --}}
            @foreach(['Electronics', 'Fashion', 'Home & Living'] as $category)
            <section class="mb-16">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold">{{ $category }}</h2>
                    <a href="#" class="text-primary-red hover:text-light-red">View All <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @for ($i = 1; $i <= 4; $i++)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <img src="https://via.placeholder.com/300" alt="Product" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <span class="text-sm text-primary-red font-medium">{{ $category }}</span>
                            <h3 class="text-lg font-semibold mt-1">Product Name {{ $i }}</h3>
                            <div class="flex items-center mt-2">
                                <div class="flex items-center">
                                    @for ($j = 1; $j <= 5; $j++)
                                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-500 ml-2">(123)</span>
                            </div>
                            <div class="flex items-center justify-between mt-3">
                                <span class="text-xl font-bold">${{ rand(50, 200) }}.99</span>
                                <button class="bg-primary-red text-white px-4 py-2 rounded-full hover:bg-light-red transition-colors">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>
            @endforeach
        </main>

         {{-- Footer remains mostly the same but with updated styling --}}
    <footer class="bg-gray-900 text-white py-12 px-[5%]">
        <!-- Previous footer content with minor padding/spacing adjustments -->
    </footer>
</body>
</html>
