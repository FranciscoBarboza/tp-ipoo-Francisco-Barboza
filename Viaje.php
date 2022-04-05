<?php

class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajerosViaje;

    public function __construct($codigoN, $destinoN, $cantMaxPasajerosN, $pasajerosViajeN)
    {
        $this->codigo=$codigoN;
        $this->destino=$destinoN;
        $this->cantMaxPasajeros=$cantMaxPasajerosN;
        $this->pasajerosViaje=$pasajerosViajeN;
    }
    //gets
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getPasajerosViaje(){
        return $this->pasajerosViaje;
    }
    //gets para el array asociativo nombre y apellido
    public function darNombrePasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['nombre'];
    }
    public function darApellidoPasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['apellido'];
    }
    public function darNroDeDocPasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['documento'];
    }

    //sets
    public function setCodigo($codigoN){
        $this->codigo=$codigoN;
    }
    public function setDestino($destinoN){
        $this->destino=$destinoN;
    }
    public function setCantMaxPasajeros($cantMaxPasajerosN){
        $this->cantMaxPasajeros=$cantMaxPasajerosN;
    }
    public function setPasajerosViaje($pasajerosViajeN){
        $this->pasajerosViaje=$pasajerosViajeN;
    }
    //set del array pasajeros
    public function cambiarNombrePasajero($nombreN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['nombre']=strtoupper($nombreN);
    }
    public function cambiarApellidoPasajero($apellidoN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['apellido']=strtoupper($apellidoN);
    }
    public function cambiarDocumentoPasajero($documentoN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['documento']=$documentoN;
    }
    //METODOS QUE AGREGUE YO
    public function darDatosPasajero($nroPasajero){
        linea();
        echo "PASAJERO N°: ". $nroPasajero . "\n";
        linea();
        echo "nombre: ". $this->darNombrePasajero($nroPasajero);
        echo "\napellido: ". $this->darApellidoPasajero($nroPasajero);
        echo "\ndocumento: ". $this->darNroDeDocPasajero($nroPasajero) . "\n";
    }
    public function mostrarlistaPasajeros(){
        /**muestra la lista de pasajeros */
        $nroDePasajerosN=count($this->getPasajerosViaje());
        $i=1;
        do {
            $this->darDatosPasajero($i);
            $i=$i+1;
        } while ($i <= $nroDePasajerosN);
    }
    public function agregarPasajero(){
        /**
         * ingresa pasajeros hasta alcanzar el maximo
         */
        $pasajerosAct= count($this->getPasajerosViaje());
        if (!($pasajerosAct < ($this->getCantMaxPasajeros()))) {
        echo "\nerror: cantidad maxima de pasajeros exedida.";
        } 
        else {
        echo "\ncantidad actual de pasajeros: ". (count($this->getPasajerosViaje()));
        echo "\ncantidad de pasajeros maximo: ". ($this->getCantMaxPasajeros()). "\n";
        linea();
        echo "\ningrese el nombre del nuevo pasajero: ";
        $nombreN=strtoupper(trim(fgets(STDIN)));
        echo "\ningrese apellido del nuevo pasajero: ";
        $apellidoN= strtoupper(trim(fgets(STDIN)));
        echo "\ningrese documento del nuevo pasajero: ";
        $documentoN= strtoupper(trim(fgets(STDIN)));
        //pusheo al array
        $aux=$this->getPasajerosViaje();
        array_push($aux, ['nombre'=>$nombreN, 'apellido'=>$apellidoN, 'documento'=>$documentoN]);  
        $this->setPasajerosViaje($aux);
        }
    }
    public function __toString()
    {
        return "codigo:". $this->getCodigo(). "\n". "destino: ". $this->getDestino(). "\n". "cantidad maxima de pasajeros: " . $this->getCantMaxPasajeros(). "\n". print_r($this->getPasajerosViaje());
    }
}
function reiniciarObj($obj){
    /**
     * inicia el objeto desde 0
     */
    $pasajeroN[0]=array('nombre' => null, 'apellido'=> null , 'documento'=>null);
    
    $obj->setCodigo(null);
    $obj->setDestino(null);
    $obj->setCantMaxPasajeros(null);
    $obj->setPasajerosViaje($pasajeroN);
}
function linea(){
    echo "=======================================\n";
}
