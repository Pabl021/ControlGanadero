<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raza;
use App\Models\RegistroAnimal;
use IIlluminate\Support\Facades\DB;



class RegistroAnimalController  extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-registroAnimal|crear-registroAnimal|editar-registroAnimal|borrar-registroAnimal', ['only' => ['index']]);
        $this->middleware('permission:crear-registroAnimal', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-registroAnimal', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-registroAnimal', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrosAnimales = RegistroAnimal::paginate(5);
        return view('registrosAnimales.index', compact('registrosAnimales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $raza = Raza::all();
        return view('registrosAnimales.crear', compact('raza'));
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
            'nombreAnimal' => 'required',
            'fechaDeNacimiento' => 'required',
            'genero' => 'required',
            'peso' => 'required',
            'raza' => 'required',
            'enVenta' => 'required',
            'vendido' => 'required',
            'estado' => 'required',
            'descripcion',
            'imagen' 

        ]);

        $animal = $request->all();

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $animal['imagen'] = "$imagenProducto";
        }
        RegistroAnimal::create($animal);
        return redirect()->route('registrosAnimales.index');
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
        $registroAnimal  = RegistroAnimal::find($id);
        $raza = Raza::all();
        return view('registrosAnimales.editar', compact('registroAnimal', 'raza'));
 
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
            'nombreAnimal' => 'required',
            'fechaDeNacimiento' => 'required',
            'genero' => 'required',
            'peso' => 'required',
            'raza' => 'required',
            'enVenta' => 'required',
            'vendido' => 'required',
            'estado' => 'required',
            'descripcion',
            'imagen' 

        ]);

        $animal = $request->all();

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $animal['imagen'] = "$imagenProducto";
        }else{
            unset($animal['imagen']);
        }
        $data  = RegistroAnimal::find($id);
        $data->update($animal);
       
        return redirect()->route('registrosAnimales.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registroAnimal  = RegistroAnimal::find($id);
        $registroAnimal->delete();
        return redirect()->route('registrosAnimales.index');
    }
}
