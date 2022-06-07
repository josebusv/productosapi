<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    use HasFactory;
    /**define la tabla a emplear en la base de datos */
    protected $table = "productos";

    /**
     * define los atributos que pueden ser asignados de forma masiva
     *
     * @var string[]
     */

    protected $fillable = [
        'nombre',
        'descripcion',
        'descripcion_larga',
        'precio',
    ];


}
