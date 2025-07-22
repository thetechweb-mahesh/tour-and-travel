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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('name'); // Destination Name (e.g., "Paris")
            $table->string('slug'); // Destination Name (e.g., "Paris")
            // $table->string('country'); // Country Name (e.g., "France")
            // $table->string('city')->nullable(); // City Name (optional)
            $table->text('description')->nullable(); // Overview of the destination
            $table->decimal('average_price', 10, 2)->nullable(); // Average cost of travel
            // $table->string('best_season')->nullable(); // Best time to visit
            // $table->json('activities')->nullable(); // List of activities (e.g., ["Hiking", "Diving"])
            $table->tinyInteger('status')->default('0');
            $table->string('image')->nullable(); // Image URL or path
            $table->string('meta_title'); // Overview of the destination
            $table->text('meta_keyword'); // Overview of the destination
            $table->text('meta_description'); // Overview of the destination
            // $table->boolean('featured')->default(false); // If the destination is highlighted
            $table->Integer('created_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
