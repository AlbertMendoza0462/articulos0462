<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = "articulos";
    protected $primaryKey = "ArticuloId";

    // public function Descripcion($value): Attribute
    // {
    //     return new Attribute(
    //         set: function ($value)
    //         {
    //             return ucwords($value);
    //         }
    //     );
    // }

    // public function Marca($value)
    // {
    //     return new Attribute(
    //         set: function ($value)
    //         {
    //             return ucfirst($value);
    //         }
    //     );
    // }
}
