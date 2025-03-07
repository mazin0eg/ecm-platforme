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
    <!-- Main Content -->
    <div class="px-[5%] py-8 flex-grow">
        <!-- Add Product Form -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-bold mb-6 flex items-center text-gray-800">
                <i class="fas fa-plus-circle text-primary-red mr-2"></i>Add New Product
            </h2>
            <form  method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-red focus:ring-primary-red">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" step="0.01" value="{{ old('price') }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-red focus:ring-primary-red">
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="3" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-red focus:ring-primary-red">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="image" required accept="image/*"
                           class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-primary-red file:text-white hover:file:bg-light-red">
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-primary-red text-white py-3 px-4 rounded-md hover:bg-light-red transition-colors">
                    <i class="fas fa-plus mr-2"></i>Add Product
                </button>
            </form>
        </div>

        <!-- Products List -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 flex items-center text-gray-800">
            <i class="fas fa-box text-primary-red mr-2"></i>Current Products
            </h2>
            <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-primary-red font-semibold">${{ number_format($product->price, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-primary-red hover:text-light-red" onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fas fa-trash-alt mr-1"></i>Delete
                        </button>
                    </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

  {{-- Footer remains mostly the same but with updated styling --}}
  <footer class="bg-gray-900 text-white py-12 px-[5%]">
    <!-- Previous footer content with minor padding/spacing adjustments -->
</footer>
</body>
</html>
