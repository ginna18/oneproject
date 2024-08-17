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
            $table->unsignedBigInteger('user_id');//id de la tabla
            $table->decimal('amount',10,2);//monto pagado
            $table->string('payment_method');//metodo de pago(tarjeta, paypal,etc.) 
            $table->enum('payment_status', ['completed', 'pending', 'failed']);
            $table->timestamp('payment_date');//fecha de pago
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        
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
