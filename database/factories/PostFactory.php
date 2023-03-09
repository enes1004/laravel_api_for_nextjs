<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'slug' => $this->faker->slug(),
          'title' => $this->faker->unique()->sentence(4,true),
          'content' => Str::of($this->faker->paragraph(4,true))->toHtmlString(),
          'content_group_id' => \App\Models\ContentGroup::factory()
        ];
    }
}
