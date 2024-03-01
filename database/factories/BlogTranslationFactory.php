<?php

namespace Database\Factories;

use App\Models\BlogTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BlogTranslationFactory extends Factory
{
    protected $model = BlogTranslation::class;

    public function definition(): array
    {
        return [
            'blog_id' => $this->faker->randomNumber(),
            'locale' => $this->faker->word(),
            'title' => $this->faker->word(),
            'content' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
