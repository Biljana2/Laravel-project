<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\Ticket;
use Database\Factories\CategoryFactory;
use Database\Factories\TicketFactory;
use Database\Factories\UserFactory;
use Database\Factories\EventFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {
     User::truncate();
    Category::truncate();
    Event::truncate();
      Ticket::truncate();
   
  Event::factory(10)->create();    
    
}
  }
