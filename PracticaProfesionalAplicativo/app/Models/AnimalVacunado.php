<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalVacunado extends Model
{
    use HasFactory;
    protected $fillable = ['nombreAnimal','medicamento','fechaMedAplicado','proximoMedicamento','enfermedad','efectosSecundarios'];

    public function getNombreAnimal(){
        $nombreAni = RegistroAnimal::find($this->nombreAnimal);
        return $nombreAni;
    }

    public function getNombreMedicamento(){
        $nombreMed = Medicamento::find($this->medicamento);
        return $nombreMed;
    }

    public function getNombreEnfermedad(){
        $nombreEnf = Enfermedad::find($this->enfermedad);
        return $nombreEnf;
    }
}
