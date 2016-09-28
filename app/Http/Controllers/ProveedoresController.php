<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Datatables;
use App\Proveedor;
use Session;
use App\Http\Requests\Proveedor\StoreProveedorRequest;
use App\Repositories\Proveedor\ProveedorRepository;

class ProveedoresController extends Controller
{
    protected $proveedores;

    public function __construct(ProveedorRepository $proveedores)
    {
        $this->proveedores = $proveedores;
    }

    public function index()
    {
        return view('proveedores.index')
        ->withBanco($this->proveedores->getAllProveedores());
    }

    public function anyData()
    {
        $proveedores = Proveedor::select(['id', 'nombre']);

        return Datatables::of($proveedores)
        ->addColumn('namelink', function ($proveedores) {
                return '<a href="proveedores/'.$proveedores->id.'" ">'.$proveedores->nombre.'</a>';
        })
        ->addColumn('action', function ($proveedores) {
                return '<a href="proveedores/'.$proveedores->id.'/edit" class="btn btn-primary"> Editar</a>';
        })->make(true);
    }

    public function create()
    {
        return view('proveedores.create');
    }
    public function store(StoreProveedorRequest $request)
    {
        $this->proveedores->create($request);
        Session::flash('flash_message', 'Nuevo Proveedor creado exitosamente!');
        return redirect()->route('proveedores.index');
    }
    public function destroy($id)
    {
        $this->proveedores->destroy($id);
        return redirect()->route('proveedores.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('proveedores.edit')
        ->withBanco($this->proveedores->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, StoreProveedorRequest $request)
    {
        $this->proveedores->update($id, $request);
        Session()->flash('flash_message', 'Proveedor modificado exitosamente');
        return redirect()->route('proveedores.index');
    }
}
