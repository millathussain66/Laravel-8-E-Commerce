<?php

namespace Database\Seeders;

use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Catagory::factory(6)->create();
        Product::factory(22)->create();
    }
}
