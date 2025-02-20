<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Business::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [

            'user_id' => User::factory(),
            'name' => fake()->unique()->company(),
            'description' => fake()->paragraph(),
            'image' => 'business.png',
            'phone' => '3'.fake()->unique()->numerify('#########'),
            'email' => fake()->unique()->email(),
            'status' => fake()->randomElement(['aprobado', 'pendiente', 'rechazado']),
            'status_description' => fake()->text(),
            'address' => fake()->address(),
            'longitude' => fake()->longitude(-74.2234, -74.0137),
            'latitude' => fake()->latitude(4.5832, 4.8353),

        ];
    }
}
