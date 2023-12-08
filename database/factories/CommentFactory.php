<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Diary;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->sentences,
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'diary_id' => Diary::inRandomOrder()->value('id') ?? Diary::factory(),
            // 'parent_id' => Comment::inRandomOrder()->value('id') ?? Comment::factory(),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Comment $comment) {
            //
        })->afterCreating(function (Comment $comment) {
            $diary = Diary::find($comment->diary_id);
            if ($diary) {
                $comment->update([
                    'created_at' => $this->faker->dateTimeBetween($diary->created_at, 'now'),
                ]);
            }
        });
    }
}
