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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('table_number');
            $table->dateTime('order_time');
            $table->string('status');
            $table->integer('total_price');

            $table->unsignedBigInteger('waiter_id');
            $table->foreign('waiter_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('cashier_id');
            $table->foreign('cashier_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};