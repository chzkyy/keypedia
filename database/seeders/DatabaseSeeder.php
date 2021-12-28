<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Detail;
use App\Models\keyboard;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // category 87key
        Product::create([
            'category_id' => 1,
            'title' => 'Akko 87 Key Keyboard',
            'image' => '87key.jpg',
            'price' => '60',
            'description' => 'Vel necessitatibus et incidunt autem odio. Eos necessitatibus quod omnis quo ratione. 
            Voluptatem explicabo unde ut ea molestiae voluptatem deleniti maxime. Ex ut quia qui enim 
            eum accusantium nesciunt.'
        ]);

        Product::create([
            'category_id' => 1,
            'title' => 'DA Gamming 87 Key Keyboard',
            'image' => '87key.jpg',
            'price' => '61',
            'description' => 'Vel necessitatibus et incidunt autem odio. Eos necessitatibus quod omnis quo ratione. 
            Voluptatem explicabo unde ut ea molestiae voluptatem deleniti maxime. Ex ut quia qui enim 
            eum accusantium nesciunt.'
        ]);

        Product::create([
            'category_id' => 1,
            'title' => 'Vortex 87 Key Keyboard',
            'image' => '87key.jpg',
            'price' => '62',
            'description' => 'Vel necessitatibus et incidunt autem odio. Eos necessitatibus quod omnis quo ratione. 
            Voluptatem explicabo unde ut ea molestiae voluptatem deleniti maxime. Ex ut quia qui enim 
            eum accusantium nesciunt.'
        ]);

        Product::create([
            'category_id' => 1,
            'title' => 'Ducky 87 Key Keyboard',
            'image' => '87key.jpg',
            'price' => '63',
            'description' => 'Vel necessitatibus et incidunt autem odio. Eos necessitatibus quod omnis quo ratione. 
            Voluptatem explicabo unde ut ea molestiae voluptatem deleniti maxime. Ex ut quia qui enim 
            eum accusantium nesciunt.'
        ]);

        Product::create([
            'category_id' => 2,
            'title' => 'Ducky 61 Key Keyboard',
            'image' => '61key.jpg',
            'price' => '63',
            'description' => 'Vel necessitatibus et incidunt autem odio. Eos necessitatibus quod omnis quo ratione. 
            Voluptatem explicabo unde ut ea molestiae voluptatem deleniti maxime. Ex ut quia qui enim 
            eum accusantium nesciunt.'
        ]);

        // category list
        Category::create([
            'category' => '87 key Keyboard',
            'image' => '87key.jpg'
        ]);

        Category::create([
            'category' => '61 Key Keyboard',
            'image' => '61key.jpg'
        ]);

        Category::create([
            'category' => 'XDA Profile Keyboard',
            'image' => 'xda.jpg'
        ]);

        Category::create([
            'category' => 'Cherry Profile Keyboard',
            'image' => 'cherry.jpg'
        ]);
    }
}
