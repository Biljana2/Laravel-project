<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_ticket', function (Blueprint $table) {
            $table->id();
             $table->foreignId('ticket_id')->constrained('tickets');
             $table->foreignId('event_id')->constrained('events');
              $table->foreignId('user_id')->constrained('users');
              $table->string('sold', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_ticket');
    }
};
