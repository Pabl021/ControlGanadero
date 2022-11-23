<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $fillable = ['nombreMedicamento', 'nombreCategoria','via','dosis','observaciones'];

    public function getCategoria(){
        $cat = CategoriaDeMedicamento::find($this->nombreCategoria);
        return $cat;
    }
}

