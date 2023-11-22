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

    public function obtenerDetalleOrden(int $idOrden){

        $resultados = DB::select('select*from orden where idOrden = ?',[$idOrden]);

        foreach ($resultados as $resultado){
            $orden = new orden(
                $resultado->idOrden,
                $resultado->nombreOrden,
                $resultado->correoOrden,
                $resultado->telOrden,
                $resultado->direccionOrden,
                $resultado->creacionOrden
            );
        }

        $Norden = [
                'idOrden' => $orden->getIdOrden(),
                'nombreOrden' => $orden->getNombreOrden(),
                'correoOrden' => $orden->getCorreoOrden(),
                'telOrden' => $orden->getTelOrden(),
                'direccionOrden' => $orden->getDireccionOrden(),
                'creacionOrden' => $orden->getCreacionOrden(),
        ];

        return $Norden;
    }

    public function editarOrden(Request $request){
        $ObjOrden = new orden(
            $request->idOrden,
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

        $respuesta = DB::insert('update orden set nombreOrden = ?, correoOrden = ?, telOrden = ?, direccionOrden = ?, creacionOrden = ? where idOrden = ?',[$nombreOrden,$correoOrden,$telOrden,$direccionOrden,$creacionOrden,$idOrden]);

        return $respuesta;
        
    }


    
}