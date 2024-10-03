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
        if (!Schema::hasTable('producto')) {
            Schema::create('producto', function (Blueprint $table) {
                $table->id();
                $table->string('nombre_producto', 255);
                $table->string('referencia', 255);
                $table->text('descripcion_de_producto')->nullable();
                $table->string('id_categoria')->nullable();
                $table->decimal('valor_doce_meses', 10, 0)->nullable();
                $table->decimal('valor_unitario_mes', 10, 0)->nullable();
                $table->decimal('valor_seis_meses', 10, 0)->nullable();
                $table->string('estado_producto', 45)->nullable();
                $table->string('imagen', 300)->nullable();
                $table->timestamps();
            });
        }
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

