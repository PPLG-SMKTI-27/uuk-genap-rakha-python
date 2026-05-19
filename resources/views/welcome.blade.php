<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'POS Application') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 dark:bg-gray-900">
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
            <!-- Navigation -->
            <nav class="bg-white dark:bg-gray-800 shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">POS</span>
                        </div>
                        <div class="flex items-center gap-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">Dashboard</a>
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit" class="text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 transition">Logout</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div class="text-center">
                    <h1 class="text-4xl sm:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                        Welcome to POS Application
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-2xl mx-auto">
                        Manage your products and categories efficiently with our comprehensive Point of Sale management system.
                    </p>
                    
                    @auth
                        <div class="flex gap-4 justify-center flex-wrap">
                            <a href="{{ route('products.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition">
                                View Products
                            </a>
                            <a href="{{ route('categories.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition">
                                View Categories
                            </a>
                            <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition">
                                Add Product
                            </a>
                        </div>
                    @else
                        <div class="flex gap-4 justify-center flex-wrap">
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>

                <!-- Features Section -->
                <div class="grid md:grid-cols-3 gap-8 mt-20">
                    <!-- Feature 1 -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                        <div class="text-4xl mb-4">📦</div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Product Management</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Easily manage your products with details like name, description, price, and stock levels.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                        <div class="text-4xl mb-4">🏷️</div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Category Organization</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Organize your products into categories for better inventory management and quick access.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                        <div class="text-4xl mb-4">📊</div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Dashboard</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            View and track your sales, inventory, and other important metrics in one place.
                        </p>
                    </div>
                </div>

                <!-- Stats Section -->
                @if(auth()->check())
                    <div class="grid md:grid-cols-2 gap-8 mt-20">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Quick Stats</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center pb-4 border-b dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Total Products</span>
                                    <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ \App\Models\Product::count() }}</span>
                                </div>
                                <div class="flex justify-between items-center pb-4 border-b dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Total Categories</span>
                                    <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{ \App\Models\Category::count() }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 dark:text-gray-400">Total Stock Value</span>
                                    <span class="text-2xl font-bold text-green-600 dark:text-green-400">
                                        Rp {{ number_format(\App\Models\Product::sum(\DB::raw('price * stock')), 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
                            <div class="space-y-3">
                                <a href="{{ route('products.create') }}" class="block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-center transition">
                                    + Add New Product
                                </a>
                                <a href="{{ route('categories.create') }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-center transition">
                                    + Add New Category
                                </a>
                                <a href="{{ route('products.index') }}" class="block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-center transition">
                                    View All Products
                                </a>
                                <a href="{{ route('categories.index') }}" class="block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-center transition">
                                    View All Categories
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Footer -->
            <footer class="bg-gray-800 dark:bg-gray-900 text-gray-400 mt-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
                    <p>&copy; 2026 POS Application. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
