<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('typeOfOrder_id');
            $table->foreign('typeOfOrder_id')->references('id')->on('order_types')->onDelete('cascade');
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('cart');
            $table->decimal('totalPrice');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
