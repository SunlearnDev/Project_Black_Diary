<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(800, 600),
            'title' => $this->faker->sentence,
            'content' => $this->faker->text(),
            'status' => $this->faker->randomElement([1, 2]),
            'user_id' => User::inRandomOrder()->value('id'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
