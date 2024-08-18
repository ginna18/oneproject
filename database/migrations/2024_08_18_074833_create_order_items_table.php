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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();//unico del predido
            $table->unsignedBigInteger('order_id');//id de la tabla orders
            $table->unsignedBigInteger('product_id');//id de la tabla products
            $table->integer('quantity');//cant de prods en el pedido
            $table->decimal('price',10,2);//precio del producto 
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade')->onDelete('cascade');

            //establece la clave primaria
            //$table->primary(['order_id','procdut_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
