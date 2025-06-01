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
        Schema::create('user_libraries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->enum('source', ['purchase', 'subscription', 'free']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('Cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_libraries');
    }
};
