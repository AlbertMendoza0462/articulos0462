<?php

namespace App\Http\Controllers;

use Dao\Services\ArticuloDao;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    private ArticuloDao $articuloDao;

    public function __construct(ArticuloDao $articuloDao)
    {
        $this->articuloDao = $articuloDao;
    }

    public function save(Request $reqArticulo)
    {
        if ($reqArticulo->ArticuloId < 0)
            return response()->json(['message' => "Invalid 'ArticuloId'"], 400);
        else if ($reqArticulo->Descripcion == null)
            return response()->json(['message' => "Invalid 'Descripcion', can't be null."], 400);
        else if ($reqArticulo->Marca == null)
            return response()->json(['message' => "Invalid 'Marca', can't be null."], 400);
        else if ($reqArticulo->Existencia == null)
            return response()->json(['message' => "Invalid 'Existencia', can't be null."], 400);

        if ($reqArticulo->ArticuloId > 0)
            $tmpArticulo = $this->articuloDao->find($reqArticulo->ArticuloId);

        // Si el Articulo no se encuentra en la base de datos o su Id es 0, se crea una instancia
        if ($tmpArticulo != null)
            $articulo = $tmpArticulo;
        else
            $articulo = new Articulo();

        $articulo->Descripcion = $reqArticulo->Descripcion;
        $articulo->Marca = $reqArticulo->Marca;
        $articulo->Existencia = $reqArticulo->Existencia;

        try {
            $this->articuloDao->save($articulo);
            return response()->json(['message' => "Success"]);
        } catch (\Throwable $th) {
            return response()->json(['message' => "Don't saved by: " . $th->getMessage()], 500);
        }
    }

    public function delete(Request $reqArticulo)
    {
        $articulo = $this->find($reqArticulo->ArticuloId);
        if ($articulo == null) {
            return response()->json(['message' => "Not found 'Articulo'"], 404);
        }

        try {
            $this->articuloDao->delete($articulo);
            return response()->json(['message' => "Success"]);
        } catch (\Throwable $th) {
            return response()->json(['message' => "Don't deleted by: " . $th->getMessage()], 500);
        }
    }

    public function find($idArticulo)
    {
        if ($idArticulo <= 0) {
            return response()->json(['message' => "Invalid 'ArticuloId'"], 400);
        }

        $articulo = $this->articuloDao->find($idArticulo);
        if ($articulo != null) {
            return $articulo;
        } else {
            return response()->json(['message' => "Object not found"], 404);
        }
    }

    public function getAll()
    {
        return $this->articuloDao->getAll();
    }
}
