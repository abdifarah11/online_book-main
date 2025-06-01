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
        Schema::create('book_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->enum('file_type', ['pdf', 'epub', 'mp3']);
            $table->string('file_path');
            $table->integer('duration')->NULL;
            $table->timestamps();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_files');
    }
};
