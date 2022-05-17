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
        $ImporteAux= parent::getImporte();
        $tipoAsiento= $this->getComodidad();
        $tieneVueltaAux= parent::getTieneVuelta();


        if (parent::hayPasajesDisponible()) {

            parent::venderPasaje($pasajero);
            $totalImporte= $ImporteAux;

            if ($tipoAsiento == "CAMA") {//si es cama sumo un 25%
                $recargo= ($ImporteAux*25)/100;
                $totalImporte= $ImporteAux + $recargo;
            }
            
            if ($tieneVueltaAux) {//si el viaje es ida y vuelta se incrementa un +50%
                $recargo= ($ImporteAux*50)/100;
                $totalImporte= $totalImporte + $recargo;
            }

            return $totalImporte;
        }
        
    }



    public function __toString()
    {
        return "\nComodidad: ". $this->getComodidad();
    }
}