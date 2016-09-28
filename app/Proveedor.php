<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
            'razonsocial',
            'cuit',
            'direccion',
            'email',
            'telefono',
            'actividad',
            'observaciones',
            'fk_ciudad_id',
            'fk_banco_id'];

    public function banco()
    {
        return $this->hasOne('App\Banco');
    }

    public function ciudad()
    {
        return $this->hasOne('App\Ciudad');
    }    
}
