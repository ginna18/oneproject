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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();//
            //$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');//id de la tabla orders
            $table->string('address_1');//primero direccion de envio
            $table->string('address_2');//
            $table->string('city');
            $table->string('state');
            $table->integer('postal_code');
            $table->string('country');
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users')
           // ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('order_id')->references('id')->on('orders')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id','order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
