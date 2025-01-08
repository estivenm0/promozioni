<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->unique()->sentence(2);

        return [
            'branch_id' => Branch::factory(),
            'category_id' =>  $this->getCategory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(10),
            'image' => 'promotion.jpg',
            'longitude' => fake()->longitude(-74.2234, -74.0137),
            'latitude' => fake()->latitude(4.5832, 4.8353),
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
