<?php

namespace App\Http\Controllers;

use DB;
use Exception;

class BienvenidaController extends Controller
{
    /**
     * Genera un array con 16 enteros equivalentes a ids, al azar
     * @return array
     * @throws Exception
     */
    public function obtenerDieciseisObrasAleatorias(): array
    {
        $numPeliculas = DB::table('obras')->count();
        $peliculasId = [];
        for ($i = 0; $i < 24; $i++) {
            $aleatorio = rand(1, $numPeliculas);
            while (in_array($aleatorio, $peliculasId)) {
                $aleatorio = rand(1, $numPeliculas);
            }
            $peliculasId[] = $aleatorio;
        }
        return $peliculasId;
    }

    /**
     * Devuelve la vista de bienvenida con esos 16 id
     * @throws Exception
     */
    public function bienvenida()
    {
        return view('bienvenida', ['obras' => DB::table('obras')->select('obras.id', 'obras.titulo', 'p.ruta', 'p.alt')->join('posters AS p', 'obras.id', '=', 'p.obra_id')->whereIn('obras.id', $this->obtenerDieciseisObrasAleatorias())->get()
        ]);
    }
}
