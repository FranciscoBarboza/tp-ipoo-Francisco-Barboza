<?php

class Aereo extends Viaje{
/* De los viajes aéreos se conoce el número del vuelo, la categoría del asiento (primera clase o no),
 nombre de la aerolínea, y la cantidad de escalas del vuelo en caso de tenerlas. */
    private int $numeroVuelo;
    private $asientoCategoria;
    private $nombreAerolinea;
    private $cantidadEscalas;
    /**
     * $asientoCategoria tiene que ser "PRIMERA CLASE" O "SEGUNDA CLASE" SEMICAMA
     * @param string $asiento categoria
     */
    public function __construct($codigoN, $destinoN, $cantMaxPasajerosN, $responsableV, $tieneVueltaV,$importeV, $numeroVueloV, $asientoCategoriaV,$nombreAerolineaV,$cantidadEscalasV)
    {//$numeroVueloV, $asientoCategoriaV,$nombreAerolineaV,$cantidadEscalasV
        $this->numeroVuelo=$numeroVueloV;
        $this->asientoCategoria=$asientoCategoriaV;
        $this->nombreAerolinea=$nombreAerolineaV;
        $this->cantidadEscalas=$cantidadEscalasV;

        parent::__construct($codigoN,$destinoN,$cantMaxPasajerosN,$responsableV,$tieneVueltaV,$importeV);
    }

    public function getNumeroVuelo(){
        return $this->numeroVuelo;
    }

    public function setNumeroVuelo($numeroVuelo){
        $this->numeroVuelo = $numeroVuelo;
    }

    public function getAsientoCategoria(){
        return $this->asientoCategoria;
    }

    public function setAsientoCategoria($asientoCategoria){
        $this->asientoCategoria = $asientoCategoria;
    }

    public function getNombreAerolinea(){
        return $this->nombreAerolinea;
    }

    public function setNombreAerolinea($nombreAerolinea){
        $this->nombreAerolinea = $nombreAerolinea;
    }

    public function getCantidadEscalas(){
        return $this->cantidadEscalas;
    }

    public function setCantidadEscalas($cantidadEscalas){
        $this->cantidadEscalas = $cantidadEscalas;
    }

    public function __toString()
    {
        return "\nNumero de vuelo: ". $this->getNumeroVuelo().
        "\nAsiento Categoria: ". $this->getAsientoCategoria().
        "\nNombre de Aerolinea: ". $this->getNombreAerolinea().
        "\nNumero de escalas: ". $this->getCantidadEscalas();
    }


    /* Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%,
     si el viaje además de ser un asiento de primera clase,
      el vuelo tiene escalas se incrementa el importe del viaje un 60%.
       Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%.
        El método retorna el importe del pasaje si se pudo realizar la venta. */
    public function venderPasaje($pasajero){
        $ImporteAux= parent::getImporte();
        
        $asientoCategoriaAux= $this->getAsientoCategoria();
        $escalasAux= $this->getCantidadEscalas();
        $tieneVueltaAux= parent::getTieneVuelta();//bool


        if (parent::hayPasajesDisponible()) {

            parent::venderPasaje($pasajero);
            $totalImporte= $ImporteAux;

            if ($asientoCategoriaAux=="PRIMERA CLASE") {//primera clase sin escalas +40%
                $recargo= ($ImporteAux*40)/100;
                $totalImporte= $ImporteAux + $recargo;

                if ($escalasAux > 0) {//si ademas tiene escalas se le suma un 60%
                    $recargo= ($ImporteAux*60)/100;
                    $totalImporte= $totalImporte + $recargo;
                }
            }
            
            if ($tieneVueltaAux) {//si el viaje es ida y vuelta se incrementa un +50%
                $recargo= ($ImporteAux*50)/100;
                $totalImporte= $totalImporte + $recargo;
            }
            
            return $totalImporte;
        }
    }
}