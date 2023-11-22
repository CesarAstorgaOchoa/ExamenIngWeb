<?php

namespace App\Http\Controllers;

use App\Models\database;
use Illuminate\Http\Request;

class ordenController extends Controller
{

    private $bdOrdenes;

    public function __construct()
    {
        $this->bdOrdenes = new database;
    }
    
    public function mostrarOrdenes(){
        $ordenes = $this->bdOrdenes->obtenerOrdenes();
        return $ordenes;
    }

    public function insertarOrden(Request $request){
        $bandera = 'Fallido';
        $respuesta = $this->bdOrdenes->insertarOrden($request);

       if($respuesta == true)
          $bandera = 'Completado';

        return $bandera;
    }

    public function obtenerDetalle(Request $request){
        $idOrden = $request->idOrden;

        $orden = $this->bdOrdenes->obtenerDetalleOrden($idOrden);
        
        return $orden;
    }

    public function editarOrden(Request $request){
        $bandera = 'Fallido';
        $respuesta = $this->bdOrdenes->editarOrden($request);
        
        if($respuesta == true)
           $bandera = 'Completado';

        return $bandera;
    }

    public function eliminarOrden(Request $request){
        $idOrden = $request->idOrden;
        $bandera = 'Fallido';
        $respuesta = $this->bdOrdenes->eliminarOrden($idOrden);
        
        if($respuesta == true)
           $bandera = 'Completado';

        
        return $bandera;
    }
}
