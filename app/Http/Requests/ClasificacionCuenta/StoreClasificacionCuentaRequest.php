<?php

namespace App\Http\Requests\ClasificacionCuenta;

use App\Http\Requests\Request;

class StoreClasificacionCuentaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return auth()->user()->hasRole('administrator');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descripcion' => 'required'
        ];
    }
}