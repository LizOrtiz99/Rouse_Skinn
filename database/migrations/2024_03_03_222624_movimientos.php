<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movimientos extends Migration
{
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articulo_id')->constrained()->onDelete('cascade');
            $table->foreignId('proveedores_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad');
            $table->date('fecha');
            $table->enum('tipo', ['entrada', 'salida']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
