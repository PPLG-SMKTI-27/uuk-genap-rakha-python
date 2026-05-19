<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create sample categories
        $categories = [
            ['name' => 'Electronics', 'description' => 'Electronic devices and gadgets'],
            ['name' => 'Clothing', 'description' => 'Apparel and fashion items'],
            ['name' => 'Food & Beverages', 'description' => 'Food items and drinks'],
            ['name' => 'Books', 'description' => 'Books and reading materials'],
            ['name' => 'Home & Garden', 'description' => 'Home and garden supplies'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create sample products
        $products = [
            ['category_id' => 1, 'name' => 'Laptop', 'description' => 'High-performance laptop', 'price' => 15000000, 'stock' => 10],
            ['category_id' => 1, 'name' => 'Smartphone', 'description' => 'Latest smartphone model', 'price' => 8000000, 'stock' => 25],
            ['category_id' => 2, 'name' => 'T-Shirt', 'description' => 'Cotton t-shirt', 'price' => 150000, 'stock' => 100],
            ['category_id' => 2, 'name' => 'Jeans', 'description' => 'Denim jeans', 'price' => 350000, 'stock' => 50],
            ['category_id' => 3, 'name' => 'Coffee', 'description' => 'Premium coffee beans', 'price' => 75000, 'stock' => 200],
            ['category_id' => 3, 'name' => 'Tea', 'description' => 'Assorted tea collection', 'price' => 45000, 'stock' => 150],
            ['category_id' => 4, 'name' => 'Programming Book', 'description' => 'Learn PHP and Laravel', 'price' => 120000, 'stock' => 30],
            ['category_id' => 5, 'name' => 'Plant Pot', 'description' => 'Ceramic plant pot', 'price' => 95000, 'stock' => 40],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
