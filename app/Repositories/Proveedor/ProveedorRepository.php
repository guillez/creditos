<?php
namespace App\Repositories\Proveedor;

use App\Proveedor;

class ProveedorRepository
{

    public function getAllProveedores()
    {
        return Proveedor::all();
    }

    public function find($id)
    {
        return Proveedor::findOrFail($id);
    }

    public function listAllProveedores()
    {
        return Proveedor::lists('nombre', 'id');
    }

    public function create($requestData)
    {
        Proveedor::create($requestData->all());
    }

    public function destroy($id)
    {
        Proveedor::findorFail($id)->delete();
    }

    public function update($id, $requestData)
    {
        $banco = Proveedor::findOrFail($id);
        $banco->fill($requestData->all())->save();
    }
}
