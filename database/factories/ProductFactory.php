<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1,10),
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'qty' => $this->faker->numberBetween(2,20),
            'price' => $this->faker->numberBetween(500, 600),
            'image' => $this->faker->imageUrl
        ];
    }
}
