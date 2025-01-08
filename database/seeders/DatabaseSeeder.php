<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Business;
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


        Business::factory(20)
            ->for($user)
            ->has(
                Branch::factory()->count(10)
                    ->afterCreating(function (Branch $branch) {
                        Promotion::factory(1)
                            ->for($branch)
                            ->create([
                                'latitude' => $branch->latitude,
                                'longitude' => $branch->longitude
                            ]);

                        Rating::factory(5)
                            ->for($branch)
                            ->create();
                    })
            )->hasAttached(Type::limit(3)->get())
            ->create();
    }

}
