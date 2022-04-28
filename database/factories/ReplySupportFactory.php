<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReplySupport>
 */
class ReplySupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'support_id' => Support::factory(),
            'user_id' => User::factory(),
            'description' => $this->faker->sentence(20),
        ];
    }
}
