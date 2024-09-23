<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto', 255);
            $table->string('referencia', 255);
            $table->text('descripcion_de_producto')->nullable();
            $table->string('id_categoria')->nullable();
            $table->decimal('valor_doce_meses', 10, 0)->nullable(); // Usar DECIMAL(10,0) para valores monetarios
            $table->decimal('valor_unitario_mes', 10, 0)->nullable(); // Usar DECIMAL(10,0) para valores monetarios
            $table->decimal('valor_seis_meses', 10, 0)->nullable(); // Usar DECIMAL(10,0) para valores monetarios
            $table->string('estado_producto', 45)->nullable();
            $table->string('imagen', 300)->nullable(); // Esto ya es correcto
            $table->timestamps();  // Esto agrega created_at y updated_at automáticamente
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}

