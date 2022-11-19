<?php

namespace App\Http\Controllers;

use App\Models\GanadoEnVenta;
use Illuminate\Http\Request;
use App\Models\RegistroAnimal;
use IIlluminate\Support\Facades\DB;

class GanadoEnVentaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:admin-crearUsuario', ['only' => ['index']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ganadosEnVenta = GanadoEnVenta::paginate(5);
        return view('ganadosEnVenta.index',compact('ganadosEnVenta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registroAnimal = RegistroAnimal::All();
        return view('ganadosEnVenta.crear', compact('registroAnimal'));
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
            'peso' => 'required',
            'raza' => 'required',
            'genero'=> 'required',
            'precioDeVenta' => 'required',
            'fechaDeVenta' => 'required',
            'nombreNuevoDuenio' => 'required',
            'observaciones' => 'required',
            'imagen' => 'required'
            
        ]);
       
        $animal = $request->all();
       

        if ($imagen = $request->file('imagen')) {
            
           
            $rutaGuardarImg = 'imagenEnVenta/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $animal['imagen'] = "$imagenProducto";
                      
        }
        
        GanadoEnVenta::create($animal);
        return redirect()->route('ganadosEnVenta.index');


   
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
        $registroAnimal = RegistroAnimal::All();
        $ganadoEnVenta  = GanadoEnVenta::find($id);
        return view('ganadosEnVenta.editar', compact('ganadoEnVenta','registroAnimal'));
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
            'peso' => 'required',
            'raza' => 'required',
            'genero'=> 'required',
            'precioDeVenta' => 'required',
            'fechaDeVenta' => 'required',
            'nombreNuevoDuenio' => 'required',
            'observaciones' => 'required',
            'imagen'
            
        ]);
        $animal = $request->all();

        if ($imagen = $request->file('imagen')) {
          
            $rutaGuardarImg = 'imagenEnVenta/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $animal['imagen'] = "$imagenProducto";
        }else{
            unset($animal['imagen']);
            
        }
       
        $ganadoEnVenta  = GanadoEnVenta::find($id);
        $ganadoEnVenta->update($animal);
        return redirect()->route('ganadosEnVenta.index');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ganadoEnVenta  = GanadoEnVenta::find($id);
        $ganadoEnVenta->delete();
        return redirect()->route('ganadosEnVenta.index');
    }

}
