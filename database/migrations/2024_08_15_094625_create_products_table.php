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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('price'); 
            $table->integer('stock');
            $table->unsignedBigInteger('category_id');//
            $table->string('imagen',255);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
        ->onUpdate('cascade')->onDelete('cascade');
        //establece la clave primaria
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
