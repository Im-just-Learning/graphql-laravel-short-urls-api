<?php

namespace Database\Factories\Shorter;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shorter\ShorterLink>
 */
class ShorterLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => fake()->url(),
            'short_url' => 'localhost/' . fake()->uuid,
            'clicks' => rand(0, 10)
        ];
    }
}
