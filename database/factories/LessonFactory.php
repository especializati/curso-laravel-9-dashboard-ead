<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();

        return [
            'id' => Str::uuid(),
            'module_id' => Module::factory(),
            'name' => $name,
            'url' => Str::slug($name),
            'video' => $this->faker->unique()->name(),
            'description' => $this->faker->sentence(20),
        ];
    }
}
