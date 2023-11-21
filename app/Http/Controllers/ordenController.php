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
}
