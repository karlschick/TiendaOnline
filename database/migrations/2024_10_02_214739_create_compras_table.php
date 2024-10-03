<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->string('documento');
            $table->decimal('total', 10, 2); // Total de la compra
            $table->timestamps(); // Crea columnas created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
