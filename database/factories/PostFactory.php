<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Firstname' => $this->faker->firstNameMale,
            'Lastname' => $this->faker->lastName,
            'description' => $this->faker->text,
            'category_id' => Category::query()->inRandomOrder()->first()->id,
            'image' => $this->faker->imageUrl

        ];
    }
}
