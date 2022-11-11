<?php

namespace App\Http\Controllers;

use App\Models\AnimalPreniado;
use App\Models\RegistroAnimal;
use Illuminate\Http\Request;




class AnimalPreniadoController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-animalPreñado|crear-animalPreñado|editar-animalPreñado|borrar-animalPreñado', ['only' => ['index']]);
         $this->middleware('permission:crear-animalPreñado', ['only' => ['create','store']]);
         $this->middleware('permission:editar-animalPreñado', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-animalPreñado', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animalesPreniados = AnimalPreniado::paginate(5);
        return view('animalesPreniados.index',compact('animalesPreniados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registroAnimal = RegistroAnimal::where('genero', "Vaca")->get();
        return view('animalesPreniados.crear', compact('registroAnimal'));
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
            'fechapreniado' => 'required',
            'madreMurioEnParto' => 'required',
            'cantidadDeNacidos' => 'required',
            'descripcion' => 'required'
            
        ]);
        AnimalPreniado::create($request->all());
        return redirect()->route('animalesPreniados.index');
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
        $registroAnimal = RegistroAnimal::where('genero', "Vaca")->get();
        $animalPreniado  = AnimalPreniado::find($id);
        return view('animalesPreniados.editar', compact('animalPreniado','registroAnimal'));
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
            'fechapreniado' => 'required',
            'madreMurioEnParto' => 'required',
            'cantidadDeNacidos' => 'required',
            'descripcion' => 'required'
        ]);
        $animalPreniado  = AnimalPreniado::find($id);
        $animalPreniado->update($request->all());
        return redirect()->route('animalesPreniados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animalPreniado  = AnimalPreniado::find($id);
        $animalPreniado->delete();
        return redirect()->route('animalesPreniados.index');
    }
}
