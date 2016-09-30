<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $fillable = [
            'nombre',
            'fk_pais_id'];


    public function pais()
    {
        return $this->hasOne('App\Pais');
    }        
}
