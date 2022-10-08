<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaDeMedicamento;


class CategoriaDemedicamentoController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-categoriaMedicamentos|crear-categoriaMedicamentos|editar-categoriaMedicamentos|borrar-categoriaMedicamentos', ['only' => ['index']]);
         $this->middleware('permission:crear-categoriaMedicamentos', ['only' => ['create','store']]);
         $this->middleware('permission:editar-categoriaMedicamentos', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-categoriaMedicamentos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaDeMedicamentos = CategoriaDeMedicamento::paginate(5);
        return view('categoriaDeMedicamentos.index',compact('categoriaDeMedicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriaDeMedicamentos.crear');
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
            'nombreCategoria'=> 'required',
            'descripcion'=> 'required'
        ]);
        CategoriaDeMedicamento::create($request->all());
        return redirect()->route('categoriaDeMedicamentos.index');
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
    public function edit(CategoriaDeMedicamento $categoriaDeMedicamento)
    {
        return view('categoriaDeMedicamentos.editar',compact('categoriaDeMedicamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaDeMedicamento $categoriaDeMedicamento)
    {
        request()->validate([
            'nombreCategoria'=> 'required',
            'descripcion'=> 'required'
        ]);
        $categoriaDeMedicamento->update($request->all());
        return redirect()->route('categoriaDeMedicamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaDeMedicamento $categoriaDeMedicamento)
    {
        $categoriaDeMedicamento->delete();
        return redirect()->route('categoriaDeMedicamentos.index');
    }
}
