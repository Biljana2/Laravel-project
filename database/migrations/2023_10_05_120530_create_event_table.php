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
       Schema::create('events', function (Blueprint $table) {
           $table->id();
           $table->foreignId('category_id');
           $table->foreignId('user_id');
           $table->string('slug')->unique();
           $table->string('title', 255);
           $table->text('excerpt');
           $table->text('body');
           $table->string('video')->nullable();
           $table->string('picture')->nullable();
           $table->string('town'); // New 'town' field
           $table->string('place'); // New 'place' field
           $table->timestamps();
           $table->timestamp('published_at')->nullable();
       });
   }

   /**
    * Reverse the migrations.
    */
    public function down(): void
   {
       Schema::dropIfExists('events');
   }
};