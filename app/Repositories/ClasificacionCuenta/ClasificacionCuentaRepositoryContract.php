<?php
namespace App\Repositories\ClasificacionCuenta;
 
interface ClasificacionCuentaRepositoryContract
{
    
    public function getAllClasificacionCuentas();

    public function find($id);
    
    public function listAllClasificacionCuentas();
    
    public function create($requestData);
    
    public function destroy($id);
    
    public function update($id, $requestData);

}