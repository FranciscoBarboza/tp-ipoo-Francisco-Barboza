<?php

include("./Viaje.php");

class Terrestre extends Viaje{
    private $comodidad;

    /**
     * comodidad es: CAMA o SEMICAMA
     * @param bool $tieneVueltaV
     * @param $comodidad
     */
    public function __construct($codigoN, $destinoN, $cantMaxPasajerosN, $responsableV, $tieneVueltaV, $importeV, $comodidadV)
    {
        $this->comodidad= $comodidadV;

        parent::__construct($codigoN, $destinoN,$cantMaxPasajerosN,$responsableV,$tieneVueltaV, $importeV);
    }

    public function getComodidad(){
        return $this->comodidad;
    }

    public function setComodidad($comodidad){
        $this->comodidad = $comodidad;
    }

    //Si el viaje es "Terrestre" y el asiento es CAMA, se incrementa el importe un 25%
    public function venderPasaje($pasajero){
        $ImporteAux= $this->getImporte();
        $tipoAsiento= $this->getComodidad();
        if ($tipoAsiento == "CAMA") {
            
        }
    }



    public function __toString()
    {
        return "\nComodidad: ". $this->getComodidad();
    }
}