<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'documento',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'cliente_id');
    }
}
