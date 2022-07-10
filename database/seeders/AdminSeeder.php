<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@seeder.com',
                'email_verified_at' => now(),
                'level' => 'admin',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@seeder.com',
                'email_verified_at' => now(),
                'level' => 'kasir',
                'password' => bcrypt('123')
            ],
        ];
        $categories = [
            [
                'name_category' => 'Kopi',
            ],
            [
                'name_category' => 'Makanan',
            ],
            [
                'name_category' => 'Leamone Tea',
            ],
        ];
        $products = [
            [
                'name_product' => 'Nasi Goreng',
                'description' => 'Ayam, Dll',
                'stock' => 100,
                'price' => 10000,
                'category_id' => 1

            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
        foreach ($users as $user) {
            User::create($user);
        }
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}