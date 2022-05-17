<?php

class Aereo extends Viaje{
/* De los viajes aéreos se conoce el número del vuelo, la categoría del asiento (primera clase o no),
 nombre de la aerolínea, y la cantidad de escalas del vuelo en caso de tenerlas. */
    private int $numeroVuelo;
    private $asientoCategoria;
    private $nombreAerolinea;
    private $cantidadEscalas;

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
}