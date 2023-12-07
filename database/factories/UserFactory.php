<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// use App\Models\User;
use App\Models\Citys;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    // protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $citys = Citys::inRandomOrder()
            ->with(['districts' => function ($query) {
                $query->inRandomOrder()->first();
            }])->first();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
            'other_name' => $this->faker->userName(),
            'about' => $this->faker->text(200),
            'phone' => $this->faker->numerify('0#########'),
            'address' => $this->faker->streetAddress(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birthdate' => $this->faker->date,
            'city_id' => $citys->id,
            'district_id' => $citys->districts[0]->id,
            'role' => 3,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
