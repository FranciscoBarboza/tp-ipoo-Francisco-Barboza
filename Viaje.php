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
    public function reiniciarObj(){
        /**
         * inicia el objeto desde 0
         */
        $pasajeroN[0]=array('nombre' => null, 'apellido'=> null , 'documento'=>null);
        
        $this->setCodigo(null);
        $this->setDestino(null);
        $this->setCantMaxPasajeros(null);
        $this->setPasajerosViaje($pasajeroN);
    }

    public function armarViaje(){
        $this->reiniciarObj();
        //menu para la opcion 1) cargar informacion de un viaje
        //validacion para no dejar vacio el codigo de viaje
        do {
            echo "\ningrese codigo de viaje: ";
            $codigoN=trim(fgets(STDIN));
            if ($codigoN==null) {
                echo "ERROR: debe ingresar un codigo.\n";
            }
        } while ($codigoN==null);
        //validacion para ingresar detino del viaje
        do {
            echo "\ningrese destino del viaje: ";
            $destinoN=strtoupper(trim(fgets(STDIN))); 
            // me encontre esta validacion para que no pase un numero como destino
            if ($destinoN == is_numeric($destinoN)) {
                echo "\nERROR: destino no puede ser un numero.";
            }
            if ($destinoN==null) {
                echo "ERROR: debe ingresar un destino\n";
            }
        } while (($destinoN==null) || ($destinoN == is_numeric($destinoN)));
        do {
            echo "\ningrese cantidad maxima de pasajeros permitidos en el viaje: ";
            $cantMaxPasajerosN=trim(fgets(STDIN));
            if ($cantMaxPasajerosN==null) {
                echo "ERROR: debe ingresar una cantidad maxima de pasajeros.\n";
            }
        } while ($cantMaxPasajerosN==null);
        
        //seteo todo
        $this->setCodigo($codigoN);
        $this->setDestino($destinoN);
        $this->setCantMaxPasajeros($cantMaxPasajerosN);
        echo "\nquiere ingresar un pasajero?(si/no): ";
        //usa strtoupper para evitar errores por las minusculas
        do {
            $siNo=strtoupper(trim(fgets(STDIN)));
            if (($siNo <> "SI") && ($siNo <> "NO")) {
                echo "\nerror: ingrese una opcion valida(si/no): ";
            }
        } while (($siNo <> "SI") && ($siNo <> "NO"));
            if ($siNo=="SI") {
                // un do while pasa poner tantos pasajeros como quiera
                $i=1;
                do {
                    //uso strouper para pasar el nombre y apellido a mayusculas
                    echo "\nnombre: ";
                    $nombreN=strtoupper(trim(fgets(STDIN)));
                    echo "\napellido: ";
                    $apellidoN=strtoupper(trim(fgets(STDIN)));
                    echo "\ndocumento: ";
                    $documentoN=strtoupper(trim(fgets(STDIN)));
                    $this->cambiarNombrePasajero($nombreN, $i);
                    $this->cambiarApellidoPasajero($apellidoN, $i);
                    $this->cambiarDocumentoPasajero($documentoN, $i);
                    
                    echo "\npasajeros: ". count($this->getPasajerosViaje()). " de ". $this->getCantMaxPasajeros(). " disponibles\n";
                    echo "quiere ingresar otro pasajero?(si/no): ";
                    do {
                        $siNo=strtoupper(trim(fgets(STDIN)));
                        if (($siNo <> "SI") && ($siNo <> "NO")) {
                            echo "\ningrese una opcion valida(si/no): ";
                        }
                    } while (($siNo <> "SI") && ($siNo <> "NO"));
                    //validacion en caso de ingresar mas pasajeros de los posibles
                    $i=$i+1;
                    if (($cantMaxPasajerosN)< $i) {
                        echo "error: ah alcanzado el maximo de pasajeros";
                    } 
                    
                } while ((($cantMaxPasajerosN)>=$i)&& ($siNo=="SI"));
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
