<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Rating;
use App\Models\Type;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $user =  User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@gmail.com',
        //     'password' => Hash::make('12345678'),
        // ]);

        Type::factory(10)->create();

        Business::factory(100)
            ->has(Rating::factory()->count(15))
            ->afterCreating(function (Business $business) {
                Category::factory()
                    ->has(
                        Promotion::factory()
                            ->for($business)
                            ->count(5))
                    ->create();
            })
            ->hasAttached(Type::inRandomOrder()->limit(3)->get())
            ->create();
    }
}
