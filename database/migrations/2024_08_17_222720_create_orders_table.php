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
            $table->unsignedBigInteger('user_id');
            $table->float('total_price');//precio total del pedido
            $table->string('status');//pendiente, procesado, enviado, completado, cancelado
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('shipping_address_id');
            $table->timestamps();

            //establece claves foraneas

        $table->foreign('user_id')->references('id')->on('users')
        ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('payment_id')->references('id')->on('payments')
        ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('shipping_address_id')->references('id')->on('shipping_addresses')
        ->onUpdate('cascade')->onDelete('cascade');
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
