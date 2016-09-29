<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Datatables;
use App\ClasificacionCuenta;
use Session;
use App\Http\Requests\ClasificacionCuenta\StoreClasificacionCuentaRequest;
use App\Repositories\ClasificacionCuenta\ClasificacionCuentaRepository;

class ClasificacionCuentasController extends Controller
{
    protected $clasificacion_cuentas;

    public function __construct(ClasificacionCuentaRepository $clasificacioncuentas)
    {
        $this->clasificacion_cuentas = $clasificacioncuentas;
    }

    public function index()
    {

        return view('clasificacioncuentas.index')
        ->withClasificacionCuenta($this->clasificacion_cuentas->getAllClasificacionCuentas());
    }

    public function anyData()
    {
        $clasificacioncuentas = ClasificacionCuenta::select(['id', 'descripcion']);

        return Datatables::of($clasificacioncuentas)
        ->addColumn('namelink', function ($clasificacioncuentas) {
                return '<a href="clasificacioncuentas/'.$clasificacioncuentas->id.'" ">'.$clasificacioncuentas->descripcion.'</a>';
        })
        ->addColumn('action', function ($clasificacioncuentas) {
                return '<a href="clasificacioncuentas/'.$clasificacioncuentas->id.'/edit" class="btn btn-primary"> Editar</a>';
        })->make(true);
    }

    public function create()
    {
        return view('clasificacioncuentas.create');
    }
    public function store(StoreClasificacionCuentaRequest $request)
    {
        $this->clasificacion_cuentas->create($request);
        Session::flash('flash_message', 'Nueva clasificación de Cuenta creada exitosamente!');
        return redirect()->route('clasificacioncuentas.index');
    }
    public function destroy($id)
    {
        $this->clasificacion_cuentas->destroy($id);
        return redirect()->route('clasificacioncuentas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('clasificacioncuentas.edit')
        ->withClasificacioncuenta($this->clasificacion_cuentas->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, StoreClasificacionCuentaRequest $request)
    {
        $this->clasificacion_cuentas->update($id, $request);
        Session()->flash('flash_message', 'Clasificación de Cuenta modificado exitosamente');
        return redirect()->route('clasificacioncuentas.index');
    }
}
