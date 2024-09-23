<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    // Indicar la tabla asociada
    protected $table = 'categoria_producto';

    // Si tienes campos protegidos para asignación masiva, define $fillable
    protected $fillable = ['nombre_categoria', 'descripcion_categoria'];

    // Otras configuraciones pueden ir aquí si es necesario
}
