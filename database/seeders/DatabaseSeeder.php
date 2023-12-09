<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Diary;
use App\Models\Comment;
use App\Models\Hashtag;
use App\Models\Reaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Hashtag::factory(7)->create();
        User::factory(5)
            ->has(Diary::factory(5))
            ->create();
        Comment::factory(20)->create(['parent_id' => null]);
        Reaction::factory(20)->create();

        // $this->call([
        //     HashtagSeeder::class,
        //     UserSeeder::class,
        //     DiarySeeder::class,
        //     CommentSeeder::class,
        //     ReactionSeeder::class,
        // ]);

        // User::factory(5)->create()->each(function ($user) {
        // $user->diaries()->saveMany(
        //     Diary::factory(5)->create(['user_id' => $user->id])->each(function ($post) {

        //         $post->comments()->saveMany(Comment::factory(5)->create(['post_id' => $post->id]));

        //         $post->reactions()->saveMany(Reaction::factory(5)->create(['post_id' => $post->id]));

        //         $post->hashtags()->saveMany(Hashtag::factory(3)->create());
        //     })
        // );

        // $followingUsers = User::where('id', '!=', $user->id)->inRandomOrder()->limit(5)->get();
        // $user->following()->attach($followingUsers);
        // });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
