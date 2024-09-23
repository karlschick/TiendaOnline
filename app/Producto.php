<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // La tabla asociada con el modelo.
    protected $table = 'producto'; // Nombre de la tabla en la base de datos

    // Los atributos que son asignables en masa.
    protected $fillable = [
        'nombre_producto',
        'referencia',
        'descripcion_de_producto',
        'id_categoria',
        'valor_unitario_mes',
        'valor_seis_meses',
        'valor_doce_meses',
        'estado_producto',
        'imagen',

    ];

    // Los atributos que deberían ser tratados como fechas.
    protected $dates = ['created_at', 'updated_at'];
}

