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
use Illuminate\Support\Facades\Hash;

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

        $user = User::factory()->create([
            'email' => 'example@gmail.com',
            'password' => Hash::make('123456789'),
        ]);


        Business::factory(10)
            ->for($user)
            ->has(
                Branch::factory()->count(10)
                    ->afterCreating(function (Branch $branch) {
                        Promotion::factory(20)
                            ->for($branch)
                            ->create();

                        Rating::factory(15)
                            ->for($branch)
                            ->create();
                    })
            )
            ->create();
        


        BusinessType::factory(50)->create();

    }
}
