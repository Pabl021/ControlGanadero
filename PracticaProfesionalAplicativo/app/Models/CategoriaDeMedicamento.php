<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaDeMedicamento extends Model
{
    use HasFactory;
    protected $fillable = ['nombreCategoria', 'descripcion'];
}
