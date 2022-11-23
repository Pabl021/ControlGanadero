<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAnimal extends Model
{
    use HasFactory;
    protected $fillable = ['nombreAnimal', 'fechaDeNacimiento','genero','peso','raza','enVenta','vendido','estado','descripcion','imagen'];

    public function getRaza(){
        $nombreRaza = Raza::find($this->raza);
        return $nombreRaza;
    }

}

