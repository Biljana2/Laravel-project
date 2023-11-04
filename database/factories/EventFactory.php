<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User; // Import the User model
use App\Models\Category; // Import the Category model
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $publishedAt = $this->faker->dateTimeThisYear; // Get a random date within the current year

    return [
        'user_id' => User::factory(),
        'category_id' => Category::factory(),
        'title' => $this->faker->sentence(),
        'slug' => $this->faker->slug(),
        'excerpt' => $this->faker->paragraphs(2, true),
        'body' => $this->faker->paragraphs(6, true),
        'video' => '/images/Koncert 4.png',
        'picture' => '/images/Koncert 4.png',
        'town' => $this->faker->city, // Generate a random town or city name
        'place' => $this->faker->secondaryAddress, 
        'published_at' => $publishedAt,
    ];
}
}
