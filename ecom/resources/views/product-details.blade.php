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
    {{-- Product Details Section --}}
    <main class="flex-grow px-[5%] py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Product Images --}}
            <div class="space-y-4">
                <div class="border rounded-lg p-4">
                    <img src="https://via.placeholder.com/600" alt="Product Image" class="w-full h-96 object-cover rounded-lg">
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <img src="https://via.placeholder.com/150" alt="Thumbnail 1" class="w-full h-24 object-cover rounded-lg cursor-pointer border hover:border-primary-red">
                    <img src="https://via.placeholder.com/150" alt="Thumbnail 2" class="w-full h-24 object-cover rounded-lg cursor-pointer border hover:border-primary-red">
                    <img src="https://via.placeholder.com/150" alt="Thumbnail 3" class="w-full h-24 object-cover rounded-lg cursor-pointer border hover:border-primary-red">
                    <img src="https://via.placeholder.com/150" alt="Thumbnail 4" class="w-full h-24 object-cover rounded-lg cursor-pointer border hover:border-primary-red">
                </div>
            </div>

            {{-- Product Info --}}
            <div class="space-y-6">
                <h1 class="text-3xl font-bold">Product Name</h1>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    <span class="text-gray-600">(150 Reviews)</span>
                </div>
                <div class="text-3xl font-bold text-primary-red">
                    $99.99
                    <span class="text-lg text-gray-500 line-through ml-2">$129.99</span>
                </div>
                <p class="text-gray-600">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, quibusdam. Praesentium aliquam sequi 
                    quis nisi reiciendis accusantium corporis explicabo distinctio.
                </p>
                
                {{-- Options --}}
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Size</label>
                        <div class="flex space-x-4">
                            @foreach (['S', 'M', 'L', 'XL'] as $size)
                                <button class="px-4 py-2 border rounded-md hover:border-primary-red hover:text-primary-red">
                                    {{ $size }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Quantity</label>
                        <div class="flex items-center space-x-4">
                            <button class="px-4 py-2 border rounded-md hover:bg-gray-100">-</button>
                            <span class="text-xl">1</span>
                            <button class="px-4 py-2 border rounded-md hover:bg-gray-100">+</button>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="space-y-4 pt-6">
                    <button class="w-full bg-primary-red text-white py-3 rounded-md hover:bg-light-red transition-colors">
                        <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                    </button>
                    <button class="w-full border border-primary-red text-primary-red py-3 rounded-md hover:bg-primary-red hover:text-white transition-colors">
                        <i class="fas fa-heart mr-2"></i>Add to Wishlist
                    </button>
                </div>
            </div>
        </div>

        {{-- Product Description & Reviews --}}
        <div class="mt-16">
            <div class="border-b border-gray-200">
                <div class="flex space-x-8">
                    <button class="px-4 py-2 text-primary-red border-b-2 border-primary-red">Description</button>
                    <button class="px-4 py-2 text-gray-600 hover:text-primary-red">Reviews (150)</button>
                </div>
            </div>
            <div class="py-8">
                <p class="text-gray-600 leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, quibusdam. Praesentium aliquam sequi 
                    quis nisi reiciendis accusantium corporis explicabo distinctio. Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Explicabo, quasi consequatur alias nostrum vel tempore rerum dolore reiciendis 
                    ipsum perspiciatis.
                </p>
            </div>
        </div>
    </main>
 {{-- Footer remains mostly the same but with updated styling --}}
 <footer class="bg-gray-900 text-white py-12 px-[5%]">
    <!-- Previous footer content with minor padding/spacing adjustments -->
</footer>
</body>
</html>
