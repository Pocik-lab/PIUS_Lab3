<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('buyer_id');
            $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('quanity');
            $table->integer('order_discount');
            $table->date('packaging_date');
            $table->date('arrival_date');
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
};
