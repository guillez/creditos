<?php
namespace App\Repositories\Banco;

use App\Banco;

class BancoRepository
{

    public function getAllBancos()
    {
        return Banco::all();
    }

    public function find($id)
    {
        return Banco::findOrFail($id);
    }

    public function listAllBancos()
    {
        return Banco::lists('nombre', 'id');
    }

    public function create($requestData)
    {
        Banco::create($requestData->all());
    }

    public function destroy($id)
    {
        Banco::findorFail($id)->delete();
    }

    public function update($id, $requestData)
    {
        $banco = Banco::findOrFail($id);
        $banco->fill($requestData->all())->save();
    }
}
