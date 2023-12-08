<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        $images = Storage::disk('public')->files('postDiary');

        return [
            'image' => $this->faker->randomElement($images),
            'title' => $this->faker->sentence,
            'content' => $this->faker->text,
            'status' => $this->faker->randomElement([1, 2]),
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
