<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            
            'event_id' => Event::factory(),
            'seat_category' => $this->faker->slug(),
            'price' => $this->faker->randomFloat(2, 10, 1000), // Generate random float between 10 and 1000 with 2 decimal places
        
            'max_no_user' => $this->faker->numberBetween(1, 10), // Generate random number between 1 and 10
            'max_no' => $this->faker->numberBetween(50,100), // Generate random number between 1 and 10
           
        ];
    }
}
