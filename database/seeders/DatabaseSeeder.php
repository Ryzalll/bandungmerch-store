<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataUser = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'address' => 'JL.Batu',
                'telephone' => '08123456789',
                'level' => 'admin',
            ],
            [
                'name' => 'Rey',
                'username' => 'Reyhand',
                'email' => 'ryhndastra@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'JL.Kenangan',
                'telephone' => '0812356788',
                'level' => 'user',
            ],
        ];

        $dataCategory = [
            [
            'code' => 'K001',
            'name' => 'Bandana',
            ],
            [
            'code' => 'K002',
            'name' => 'Belt',
            ],
            [
            'code' => 'K003',
            'name' => 'Tumbler',
            ],
            [
            'code' => 'K004',
            'name' => 'Keychain',
            ],
            [
            'code' => 'K005',
            'name' => 'KaosKaki',
            ],
        ];

        $dataProduct = [
            [
                'category_id' => 1,
                'name' => 'Bandana',
                'description' => 'Bandana Description',
                'photo' => 'bandana_hitam.jpeg',
                'price' => 29000,
                'stock' => 100,
            ],
            [
                'category_id' => 2,
                'name' => 'Belt',
                'description' => 'Belt Description',
                'photo' => 'belt_thrasher.jpeg',
                'price' => 29000,
                'stock' => 100,
            ],
        ];

        $dataOrder = [
            [
                'user_id' => 2,
                'code' => 'TRX-0001',
                'total_amount' => 58000,
                'status' => 'pending',
            ],
            [
                'user_id' => 2,
                'code' => 'TRX-0002',
                'total_amount' => 58000,
                'status' => 'pending',
            ],
        ];

        $dataOrderDetail = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'price' => 29000,
                'amount'=> 29000,
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 29000,
                'amount'=> 29000,
            ],
            [
                'order_id' => 2,
                'product_id' => 2,
                'quantity' => 2,
                'price' => 29000,
                'amount'=> 58000,
            ],
        ];

        foreach ($dataUser as $user) {
            User::create($user);
        }

        foreach ($dataCategory as $category) {
            Category::create($category);
        }

        foreach ($dataProduct as $product) {
            Product::create($product);
        }

        // foreach ($dataOrder as $order) {
        //     Order::create($order);
        // }

        // foreach ($dataOrderDetail as $orderDetail) {
        //     OrderDetail::create($orderDetail);
        // }
    }
}
