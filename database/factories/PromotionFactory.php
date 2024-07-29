<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::factory(),
            'category_id' =>  $this->getCategory(),
            'title' => fake()->sentence(2),
            'slug' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'image' => 'promotion.jpg',
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ];
    }

    private function getCategory()
    {
        if (app()->environment('testing')) {
            return Category::factory();
        }
        
        return Category::inRandomOrder()->first()->id ?? Category::factory()->create()->id;
    }
}
