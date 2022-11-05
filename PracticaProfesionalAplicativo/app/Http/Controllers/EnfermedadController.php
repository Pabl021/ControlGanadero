<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-enfermedad|crear-enfermedad|editar-enfermedad|borrar-enfermedad', ['only' => ['index']]);
         $this->middleware('permission:crear-enfermedad', ['only' => ['create','store']]);
         $this->middleware('permission:editar-enfermedad', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-enfermedad', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedad = Enfermedad::paginate(5);
        return view('enfermedades.index',compact('enfermedad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfermedades.crear');
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
            'nombreEnfermedad'=> 'required',
            'sintomas' => 'required'
        ]);
        Enfermedad::create($request->all());
        return redirect()->route('enfermedades.index');
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
    public function edit($id)
    {
        $enfermedad  = Enfermedad::find($id);
        return view('enfermedades.editar',compact('enfermedad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombreEnfermedad'=> 'required',
            'sintomas' => 'required'
        ]);
        $enfermedad  = Enfermedad::find($id);
        $enfermedad->update($request->all());
        return redirect()->route('enfermedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedad  = Enfermedad::find($id);
        $enfermedad->delete();
        return redirect()->route('enfermedades.index');
    }
}
