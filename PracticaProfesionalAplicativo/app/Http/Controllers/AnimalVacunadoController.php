<?php

namespace App\Http\Controllers;

use App\Models\AnimalVacunado;
use App\Models\Enfermedad;
use App\Models\Medicamento;
use App\Models\RegistroAnimal;
use Illuminate\Http\Request;

class AnimalVacunadoController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-aniVacunados|crear-aniVacunados|editar-aniVacunados|borrar-aniVacunados', ['only' => ['index']]);
         $this->middleware('permission:crear-aniVacunados', ['only' => ['create','store']]);
         $this->middleware('permission:editar-aniVacunados', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-aniVacunados', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animalesVacunados = AnimalVacunado::paginate(5);
        return view('animalesVacunados.index',compact('animalesVacunados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animales = RegistroAnimal::all();
        $medicamento = Medicamento::all();
        $enfermedad= Enfermedad::all();
        return view('animalesVacunados.crear')
        ->with('animales', $animales)
        ->with('medicamento', $medicamento)
        ->with('enfermedad', $enfermedad);
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
            'nombreAnimal'=> 'required',
            'medicamento' => 'required',
            'fechaMedAplicado' => 'required',
            'proximoMedicamento' => 'required',
            'enfermedad' => 'required',
            'efectosSecundarios' 

        ]);
        AnimalVacunado::create($request->all());
        return redirect()->route('animalesVacunados.index');
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
        $animalVacunado  = AnimalVacunado::find($id);
        $AnimalRegistrado = RegistroAnimal::all();
        $medicamento = Medicamento::all();
        $enfermedad = Enfermedad::all();
        return view('animalesVacunados.editar')
        ->with('animalVacunado', $animalVacunado)
        ->with('AnimalRegistrado', $AnimalRegistrado)
        ->with('medicamento', $medicamento)
        ->with('enfermedad', $enfermedad);
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
            'nombreAnimal'=> 'required',
            'medicamento' => 'required',
            'fechaMedAplicado' => 'required',
            'proximoMedicamento' => 'required',
            'enfermedad' => 'required',
            'efectosSecundarios' 

        ]);
        $animalVacunado  = AnimalVacunado::find($id);
        $animalVacunado->update($request->all());
        return redirect()->route('animalesVacunados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animalVacunado  = AnimalVacunado::find($id);
        $animalVacunado->delete();
        return redirect()->route('animalesVacunados.index');
    }
}
