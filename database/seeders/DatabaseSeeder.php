<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Controllers\HandleImg\ImdUpload;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory()
        ->count(5)
        ->has(\App\Models\Diary::factory()->count(3), 'diary')
        ->create();

        foreach ($users as $user) {
            $avatar = new ImdUpload;
            $avatar->autoAvatar($user);
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
