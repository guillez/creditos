<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = [
            'nombre',
            'CP'
            'fk_provincia_id'];


    public function provincia()
    {
        return $this->hasOne('App\Provincia');
    }    
}
