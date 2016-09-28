<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Datatables;
use App\Banco;
use Session;
use App\Http\Requests\Banco\StoreBancoRequest;
use App\Repositories\Banco\BancoRepository;

class BancosController extends Controller
{
    protected $bancos;

    public function __construct(BancoRepository $bancos)
    {
        $this->bancos = $bancos;
    }

    public function index()
    {
        return view('bancos.index')
        ->withBanco($this->bancos->getAllBancos());
    }

    public function anyData()
    {
        $bancos = Banco::select(['id', 'nombre']);

        return Datatables::of($bancos)
        ->addColumn('namelink', function ($bancos) {
                return '<a href="bancos/'.$bancos->id.'" ">'.$bancos->nombre.'</a>';
        })
        ->addColumn('action', function ($bancos) {
                return '<a href="bancos/'.$bancos->id.'/edit" class="btn btn-primary"> Editar</a>';
        })->make(true);
    }

    public function create()
    {
        return view('bancos.create');
    }
    public function store(StoreBancoRequest $request)
    {
        $this->bancos->create($request);
        Session::flash('flash_message', 'Nuevo Banco creado exitosamente!');
        return redirect()->route('bancos.index');
    }
    public function destroy($id)
    {
        $this->bancos->destroy($id);
        return redirect()->route('bancos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('bancos.edit')
        ->withBanco($this->bancos->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, StoreBancoRequest $request)
    {
        $this->bancos->update($id, $request);
        Session()->flash('flash_message', 'Banco modificado exitosamente');
        return redirect()->route('bancos.index');
    }
}
