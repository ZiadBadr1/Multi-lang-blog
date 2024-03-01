<?php

namespace Database\Factories;

use App\Models\TagTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TagTranslationFactory extends Factory
{
    protected $model = TagTranslation::class;

    public function definition(): array
    {
        return [
            'tag_id' => $this->faker->randomNumber(),
            'locale' => $this->faker->word(),
            'title' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
