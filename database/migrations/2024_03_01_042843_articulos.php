<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articulos extends Migration
{
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('sku')->nullable(); // Campo SKU opcional
            $table->string('categoria')->nullable(); // Campo Categoría opcional
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->string('lote')->nullable(); // Campo Lote opcional
            $table->date('fecha_vencimiento')->nullable(); // Campo Fecha de vencimiento opcional
            $table->decimal('precio', 8, 2);
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
