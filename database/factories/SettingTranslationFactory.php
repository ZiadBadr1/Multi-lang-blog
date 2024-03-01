<?php

namespace Database\Factories;

use App\Models\SettingTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SettingTranslationFactory extends Factory
{
    protected $model = SettingTranslation::class;

    public function definition(): array
    {
        return [
            'setting_id' => $this->faker->randomNumber(),
            'locale' => $this->faker->word(),
            'title' => $this->faker->word(),
            'content' => $this->faker->word(),
            'address' => $this->faker->address(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
