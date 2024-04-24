<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'userId' => $this->faker->randomDigitNotNull(),
            'title' => $this->faker->word(),
            'body' => $this->faker->text(250),
            'isFollow' => $this->faker->boolean(30)
        ];
    }
}
