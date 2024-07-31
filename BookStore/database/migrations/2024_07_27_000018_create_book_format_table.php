<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // TODO add a stock column
        Schema::create('book_format', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('format_id');
            $table->foreign('book_id')->references('id')
                ->on('books')
                ->onDelete('cascade');
            $table->foreign('format_id')->references('id')
                ->on('formats')
                ->onDelete('cascade');
            $table->date('published_date');
            $table->integer('pages');
            $table->string('cover_image');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_format');
    }
};
