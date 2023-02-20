<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\Section;
use App\Models\User;
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
         User::factory(10)->create();
         Section::factory(5)->create();
         Product::factory(20)->create();
         Review::factory(40)->create();
    }
}
