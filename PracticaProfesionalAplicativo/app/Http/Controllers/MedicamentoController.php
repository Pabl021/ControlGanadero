<?php

namespace App\Http\Controllers;

use App\Models\CategoriaDeMedicamento;
use Illuminate\Http\Request;
use App\Models\Medicamento;

class MedicamentoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-medicamentos|crear-medicamentos|editar-medicamentos|borrar-medicamentos', ['only' => ['index']]);
         $this->middleware('permission:crear-medicamentos', ['only' => ['create','store']]);
         $this->middleware('permission:editar-medicamentos', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-medicamentos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = Medicamento::paginate(5);
        return view('medicamentos.index',compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamentos = CategoriaDeMedicamento::all();;

        return view('medicamentos.crear',compact('medicamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombreMedicamento'=> 'required',
            'nombreCategoria'=> 'required',
            'via'=> 'required',
            'dosis'=> 'required',
            'observaciones'=> 'required'
        ]);
        Medicamento::create($request->all());
        return redirect()->route('medicamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        $catMedicamento = CategoriaDeMedicamento::all();
        return view('medicamentos.editar',compact('medicamento','catMedicamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        request()->validate([
            'nombreMedicamento'=> 'required',
            'nombreCategoria'=> 'required',
            'via'=> 'required',
            'dosis'=> 'required',
            'observaciones'=> 'required'
        ]);
        $medicamento->update($request->all());
        return redirect()->route('medicamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('medicamentos.index');
    }
}
