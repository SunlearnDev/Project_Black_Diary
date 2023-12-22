<?php

namespace Database\Factories;

use App\Models\Hashtag;
use App\Models\Diary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hashtag>
 */
class HashtagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->word,
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function () {
            //
        })->afterCreating(function (Hashtag $hashtag) {
            $diaryId = Diary::inRandomOrder()->value('id');
            if ($diaryId)
                $hashtag->diaries()->attach($diaryId);
        });
    }
}
