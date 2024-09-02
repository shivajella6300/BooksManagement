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
        Schema::create('books_lists', function (Blueprint $table) 
        {
            $table->id('book_id'); // Creates an auto-incrementing id column named book_id
            $table->string('title');
            $table->string('author');
            $table->date('publish_date'); // Stores the full date (year, month, day)
            $table->string('genre');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_lists');
    }
};
