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
        Schema::create('book_format_discount', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_format_id');
            $table->foreign('book_format_id')->references('id')
                ->on('book_format')
                ->onDelete('cascade');
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')
                ->on('discounts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_format_discount');
    }
};
