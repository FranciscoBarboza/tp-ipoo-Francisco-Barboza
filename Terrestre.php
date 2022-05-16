<?php

include("./Viaje.php");

class Terrestre extends Viaje{
    private $comodidad;

    /**
     * comodidad es: CAMA o SEMICAMA
     * @param bool $tieneVueltaV
     * @param $comodidad
     */
    public function __construct($codigoN, $destinoN, $cantMaxPasajerosN, $responsableV, $tieneVueltaV, $comodidadV)
    {
        $this->comodidad= $comodidadV;

        parent::__construct($codigoN, $destinoN,$cantMaxPasajerosN,$responsableV,$tieneVueltaV);
    }

    public function getComodidad(){
        return $this->comodidad;
    }

    public function setComodidad($comodidad){
        $this->comodidad = $comodidad;
    }

    public function __toString()
    {
        return "\nComodidad: ". $this->getComodidad();
    }
}