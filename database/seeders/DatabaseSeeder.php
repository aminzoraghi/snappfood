<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        \App\Models\RestaurantCategory::factory(10)->create();
        \App\Models\FoodCategory::factory(10)->create();
        \App\Models\Discount::factory(10)->create();
        \App\Models\Banner::factory(10)->create();


    }
}
