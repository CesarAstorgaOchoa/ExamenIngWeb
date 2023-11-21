<?php

namespace App\Models;

use App\Models\Objetos\orden;
use Illuminate\Support\Facades\DB;


class database
{

    public function obtenerOrdenes(){
        $ordenes = DB::select("select*from orden");
        $arrayOrdenes = [];

        foreach ($ordenes as $orden){
            $ObjOrden = new orden(
                $orden->idOrden,
                $orden->nombreOrden,
                $orden->correoOrden,
                $orden->telOrden,
                $orden->direccionOrden,
                $orden->creacionOrden
            );

            $arrayOrdenes[] = [
                'idOrden' => $ObjOrden->getIdOrden(),
                'nombreOrden' => $ObjOrden->getNombreOrden(),
                'correoOrden' => $ObjOrden->getCorreoOrden(),
                'telOrden' => $ObjOrden->getTelOrden(),
                'direccionOrden' => $ObjOrden->getDireccionOrden(),
                'creacionOrden' => $ObjOrden->getCreacionOrden(),
            ];
        }

        $json = json_encode($arrayOrdenes);
        return $arrayOrdenes;      
    }
}