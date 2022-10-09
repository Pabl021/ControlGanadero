<?php

namespace App\Http\Controllers;

use App\Models\Raza;
use Illuminate\Http\Request;

class RazaController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-raza|crear-raza|editar-raza|borrar-raza', ['only' => ['index']]);
         $this->middleware('permission:crear-raza', ['only' => ['create','store']]);
         $this->middleware('permission:editar-raza', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-raza', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raza = Raza::paginate(5);
        return view('razas.index',compact('raza'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('razas.crear');
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
            'nombreRaza'=> 'required',
            'pesoPromNac' => 'required',
            'pesoMaxAdulto' => 'required',
            'observaciones'
        ]);
        Raza::create($request->all());
        return redirect()->route('razas.index');
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
    public function edit(Raza $raza)
    {
        return view('razas.editar',compact('raza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raza $raza)
    {
        request()->validate([
            'nombreRaza'=> 'required',
            'pesoPromNac' => 'required',
            'pesoMaxAdulto' => 'required',
            'observaciones'
        ]);
        $raza->update($request->all());
        return redirect()->route('razas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raza $raza)
    {
        $raza->delete();
        return redirect()->route('razas.index');
    }
}
