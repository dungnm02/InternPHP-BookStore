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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('book_format_id');
            $table->foreign('order_id')->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->foreign('book_format_id')->references('id')
                ->on('book_format')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('discount_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
