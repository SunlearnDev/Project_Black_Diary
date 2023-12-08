<?php

namespace Database\Factories;

use App\Models\Diary;
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
        $imagePaths = Storage::disk('public')->files('postDiary');
        $urls = array_map(function ($image) {
            return Storage::url($image);
        }, $imagePaths);

        return [
            'image' => $this->faker->randomElement($urls),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(10, true),
            'status' => $this->faker->randomElement([1, 2]),
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Diary $diary) {
            //
        })->afterCreating(function (Diary $diary) {
            $user = User::find($diary->user_id);
            if ($user) {
                $diary->update([
                    'created_at' => $this->faker->dateTimeBetween($user->created_at, 'now'),
                ]);
            }
        });
    }
}
