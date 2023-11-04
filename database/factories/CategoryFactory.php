<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word, // Generate unique category names
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
