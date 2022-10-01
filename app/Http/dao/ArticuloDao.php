<?php

namespace App\Http\Dao;

use App\Models\Articulo;
use Exception;
use Illuminate\Http\Request;

class ArticuloDao
{
    public function save($articulo)
    {
        if ($articulo->save())
            return true;
        else
            throw new Exception("Unknown error", 1);
    }

    public function delete($articulo)
    {
        if ($articulo->delete())
            return true;
        else
            throw new Exception("Unknown error", 1);
    }

    public function find($idArticulo)
    {
        return Articulo::find($idArticulo);
    }

    public function getAll()
    {
        return Articulo::all();
    }
}
