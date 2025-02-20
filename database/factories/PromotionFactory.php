<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PromotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promotion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(2);

        return [
            'business_id' => Business::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->text(),
            'image' => 'promotion.png',
            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ];
    }
}
