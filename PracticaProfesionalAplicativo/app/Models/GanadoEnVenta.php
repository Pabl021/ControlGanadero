<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GanadoEnVenta extends Model
{
    use HasFactory;
    protected $fillable = ['nombreAnimal', 'peso','raza','genero','precioDeVenta','fechaDeVenta','nombreNuevoDuenio','imagen','observaciones'];

    public function getNombreAnimal(){
        $nombreAni = RegistroAnimal::find($this->nombreAnimal);
        return $nombreAni;
    }

    public function getRaza(){
        $nombreRaza = Raza::find($this->raza);
        return $nombreRaza;
    }

}
