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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();//identificador unico del pago
            $table->unsignedBigInteger('order_id');//id de la tabla orders
            $table->float('amount');//monto pagado
            $table->string('payment_method');//metodo de pago(tarjeta, paypal,etc.) 
            $table->integer('payment_status');//estado del pago(completado, pendiente, fallido)
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')
            ->onUpdate('cascade')->onDelete('cascade');
        

            //establece la clave primaria
            $table->primary(['order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
