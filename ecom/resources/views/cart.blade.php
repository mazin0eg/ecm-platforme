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
    {{-- Cart Content --}}
    <div class="flex-grow container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Shopping Cart</h1>
        
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Cart Items --}}
            <div class="lg:w-2/3">
                {{-- Sample Cart Items (you'll want to loop through actual cart items) --}}
                <div class="bg-white rounded-lg shadow-md mb-4">
                    <div class="p-6 flex flex-col sm:flex-row items-center gap-4">
                        <img src="https://via.placeholder.com/150" alt="Product" class="w-24 h-24 object-cover rounded-md">
                        <div class="flex-grow">
                            <h3 class="text-lg font-semibold">Sample Product</h3>
                            <p class="text-gray-600">Category: Electronics</p>
                            <p class="text-primary-red font-bold">$99.99</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="bg-gray-200 px-3 py-1 rounded-md hover:bg-gray-300">-</button>
                            <input type="number" value="1" class="w-16 text-center border rounded-md p-1">
                            <button class="bg-gray-200 px-3 py-1 rounded-md hover:bg-gray-300">+</button>
                        </div>
                        <button class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                {{-- Empty Cart Message --}}
                <div class="hidden bg-white rounded-lg shadow-md p-8 text-center">
                    <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Your cart is empty</h3>
                    <p class="text-gray-600 mb-4">Add some products to your cart and they will appear here</p>
                    <a href="/" class="bg-primary-red text-white px-6 py-2 rounded-md hover:bg-light-red inline-block">
                        Continue Shopping
                    </a>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span>$99.99</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span>$10.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax</span>
                            <span>$5.00</span>
                        </div>
                        <div class="border-t pt-3">
                            <div class="flex justify-between font-bold">
                                <span>Total</span>
                                <span>$114.99</span>
                            </div>
                        </div>
                    </div>
                    <button class="w-full bg-primary-red text-white py-3 rounded-md hover:bg-light-red transition-colors">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
 {{-- Footer remains mostly the same but with updated styling --}}
 <footer class="bg-gray-900 text-white py-12 px-[5%]">
    <!-- Previous footer content with minor padding/spacing adjustments -->
</footer>
</body>
</html>
