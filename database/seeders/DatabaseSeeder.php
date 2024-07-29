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
            TypeSeeder::class,
            MoonshineSeeder::class
        ]);

        // User::factory(10)->create();

        for ($i=0; $i < 10; $i++) { 
        Business::factory(1)
            ->for(User::factory())
            ->has(
                Branch::factory()->count(4)
                    ->afterCreating(function (Branch $branch) {
                        Promotion::factory(1)
                            ->for($branch)
                            ->create();

                        Rating::factory(2)
                            ->for($branch)
                            ->create();
                    })
            )
            ->create();
        }


        BusinessType::factory(50)->create();

    }
}
