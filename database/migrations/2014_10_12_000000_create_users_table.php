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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');//
            $table->string('movil',16);//
            $table->string('fijo',16);//
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //$table->string('address',500);//direccion de envio 
            $table->rememberToken();
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

              //establece claves foraneas

        $table->foreign('role_id')->references('id')->on('roles')
        ->onUpdate('cascade')->onDelete('cascade');
        //establece la clave primaria
        $table->primary(['role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
