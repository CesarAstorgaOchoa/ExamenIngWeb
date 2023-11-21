<?php

namespace App\Models\Objetos;

class orden{

    private int $idOrden;
    private String $nombreOrden, $correoOrden, $telOrden, $direccionOrden, $creacionOrden;

    public function __construct(int $idOrden, String $nombreOrden, String $correoOrden, String $telOrden, String $direccionOrden, String $creacionOrden)
    {
        $this->idOrden = $idOrden;
        $this->nombreOrden = $nombreOrden;
        $this->correoOrden = $correoOrden;
        $this->telOrden = $telOrden;
        $this->direccionOrden = $direccionOrden;
        $this->creacionOrden = $creacionOrden;
        
    }

    public function getIdOrden(): int
    {
        return $this->idOrden;
    }

    public function setIdOrden(int $idOrden): void
    {
        $this->idOrden = $idOrden;
    }

    public function getNombreOrden(): string
    {
        return $this->nombreOrden;
    }

    public function setNombreOrden(string $nombreOrden): void
    {
        $this->nombreOrden = $nombreOrden;
    }

    public function getCorreoOrden(): string
    {
        return $this->correoOrden;
    }

    public function setCorreoOrden(string $correoOrden): void
    {
        $this->correoOrden = $correoOrden;
    }

    public function getTelOrden(): string
    {
        return $this->telOrden;
    }

    public function setTelOrden(string $telOrden): void
    {
        $this->telOrden = $telOrden;
    }

    public function getDireccionOrden(): string
    {
        return $this->direccionOrden;
    }

    public function setDireccionOrden(string $direccionOrden): void
    {
        $this->direccionOrden = $direccionOrden;
    }

    public function getCreacionOrden(): string
    {
        return $this->creacionOrden;
    }

    public function setCreacionOrden(string $creacionOrden): void
    {
        $this->creacionOrden = $creacionOrden;
    }

}