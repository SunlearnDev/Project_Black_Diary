<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Diary;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => 1,
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'diary_id' => Diary::inRandomOrder()->value('id') ?? Diary::factory(),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Reaction $reaction) {
            //
        })->afterCreating(function (Reaction $reaction) {
            $diary = Diary::find($reaction->diary_id);
            if ($diary) {
                $reaction->update([
                    'created_at' => $this->faker->dateTimeBetween($diary->created_at, 'now'),
                ]);
            }
        });
    }
}
