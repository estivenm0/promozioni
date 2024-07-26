<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Business;
use App\Models\BusinessType;
use App\Models\Promotion;
use App\Models\Rating;
use App\Models\Type;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            TypeSeeder::class
        ]);

        // User::factory(10)->create();
        
        Branch::factory(30)->
        has(Promotion::factory()->count(10))
        ->has(Rating::factory()->count(5))
        ->for(Business::factory())
        ->create();

        BusinessType::factory(100)->create();
        
    

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

       

    }
}
