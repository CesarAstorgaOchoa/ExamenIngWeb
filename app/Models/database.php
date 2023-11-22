<?php

namespace App\Models;

use App\Models\Objetos\orden;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


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

    public function insertarOrden(Request $request){
        $ObjOrden = new orden(
            0,
            $request->nombreOrden,
            $request->correoOrden,
            $request->telOrden,
            $request->direccionOrden,
            $request->creacionOrden
        );

        $idOrden = $ObjOrden->getIdOrden();
        $nombreOrden = $ObjOrden->getNombreOrden();
        $correoOrden = $ObjOrden->getCorreoOrden();
        $telOrden = $ObjOrden->getTelOrden();
        $direccionOrden = $ObjOrden->getDireccionOrden();
        $creacionOrden = $ObjOrden->getCreacionOrden();

        $respuesta = DB::insert('insert into orden values(?,?,?,?,?,?)',[$idOrden,$nombreOrden,$correoOrden,$telOrden,$direccionOrden,$creacionOrden]);

        return $respuesta;
    }
}