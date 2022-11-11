<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalPreniado extends Model
{
    use HasFactory;
    protected $fillable = ['nombreAnimal','fechapreniado','madreMurioEnParto','cantidadDeNacidos','descripcion'];
}
