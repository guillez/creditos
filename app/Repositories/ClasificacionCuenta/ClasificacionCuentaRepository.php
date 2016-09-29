<?php
namespace App\Repositories\ClasificacionCuenta;

use App\ClasificacionCuenta;

class ClasificacionCuentaRepository
{

    public function getAllClasificacionCuentas()
    {
        return ClasificacionCuenta::all();
    }

    public function find($id)
    {
        return ClasificacionCuenta::findOrFail($id);
    }

    public function listAllClasificacionCuentas()
    {
        return ClasificacionCuenta::lists('descripcion', 'id');
    }

    public function create($requestData)
    {
        ClasificacionCuenta::create($requestData->all());
    }

    public function destroy($id)
    {
        ClasificacionCuenta::findorFail($id)->delete();
    }

    public function update($id, $requestData)
    {
        $clasificacioncuenta = ClasificacionCuenta::findOrFail($id);
        $clasificacioncuenta->fill($requestData->all())->save();
    }
}
