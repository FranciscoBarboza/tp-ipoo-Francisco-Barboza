<?php
include_once("Persona.php");
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajerosViaje;
    private $responsableV;

    public function __construct($codigoN, $destinoN, $cantMaxPasajerosN, $responsableV)
    {
        $this->codigo=$codigoN;
        $this->destino=$destinoN;
        $this->cantMaxPasajeros=$cantMaxPasajerosN;
        $this->pasajerosViaje=array();
        $this->responsableV= $responsableV;
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
    public function getResponsableV(){
        return $this->responsableV;
    }

    //"gets" para el array asociativo nombre y apellido a cambiar
    /*public function darNombrePasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['nombre'];
    }*/ /*
    public function darApellidoPasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['apellido'];
    }
    public function darNroDeDocPasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['documento'];
    }
    public function darNombrePasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]->getNombre();
    }
    public function darNroDeDocPasajero2($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]->getApellido();
    }
    */

    

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
    public function setResponsableV($responsableV){
        $this->responsableV = $responsableV;
    }
    //"sets" para modificacion del array pasajeros
    /*
    public function cambiarNombrePasajero($nombreN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['nombre']=strtoupper($nombreN);
    }
    public function cambiarApellidoPasajero($apellidoN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['apellido']=strtoupper($apellidoN);
    }
    public function cambiarDocumentoPasajero($documentoN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['documento']=$documentoN;
    }
    */
    //METODOS QUE AGREGUE YO
    public function darDatosPasajero($nroPasajero){
        // muestra datos del pasajero. me dijeron que en los metodos no iba nada de texto a pantalla 
        //pero no sabia donde poner esto
        return "=======================================\n".
        "PASAJERO N°: ". $nroPasajero. "\n" .
        "=======================================\n".
        "Nombre: ". ($this->getPasajerosViaje()[$nroPasajero-1])->getNombre().
        "\nApellido: ". ($this->getPasajerosViaje()[$nroPasajero-1])->getApellido().
        "\nDNI: ". ($this->getPasajerosViaje()[$nroPasajero-1])->getDNI();
        "\nTelefono: ". ($this->getPasajerosViaje()[$nroPasajero-1])->getTelefono();
    }
    public function mostrarlistaPasajeros(){
        /**muestra la lista de pasajeros */
        $nroDePasajerosN=count($this->getPasajerosViaje());
        $lineaString="";
        $i=1;
        do {

            $lineaString = $lineaString . ($this->darDatosPasajero($i)) . "\n";//en este metodo descuenta 1 al $i
            $i=$i+1;
        } while ($i <= $nroDePasajerosN);
    } 
    
    public function agregarPasajero($nombre, $apellido, $dni, $telefono){
        $aux=$this->getPasajerosViaje();
        $pasajeroNuevo= new Persona($nombre, $apellido, $dni, $telefono);

        array_push($aux, $pasajeroNuevo);//pusheo el nuevo pasajero dentro del array pasajeros viaje
        
        $this->setPasajerosViaje($aux);//seteo la nueva lista de pasajeros
        
    }
    public function reiniciarObj(){
        /**
         * inicia el objeto desde 0
         * si hubiera usado un arrays para guardar viajes lo hubiera hecho distinto
         */
        $pasajeroN=array();
        
        $this->setCodigo(null);
        $this->setDestino(null);
        $this->setCantMaxPasajeros(null);
        $this->setPasajerosViaje($pasajeroN);
        
    }
    public function eliminarPasajero($pasajeroN){
        $nuevoArray=$this->getPasajerosViaje();
        array_splice($nuevoArray, ($pasajeroN-1), 1);
        $this->setPasajerosViaje($nuevoArray);

    }
    public function __toString()
    {
        return "codigo:". $this->getCodigo().
         "\n". "destino: ". $this->getDestino().
          "\n". "cantidad maxima de pasajeros: " .
           $this->getCantMaxPasajeros(). "\n".// print_r($this->getPasajerosViaje());
           $this->mostrarlistaPasajeros();
    }
    public function listaDePasajeros(){//todavia me falta sacarla del codigo
        $listaDePasajeros="";
        $array=$this->getPasajerosViaje();
        foreach ( $array as $key => $value) {    
            $listaDePasajeros .= "\n=======================================\n". 
            "PASAJERO N°: " . ($key+1).
            "\n=======================================\n". 
            $this->getPasajerosViaje()[$key];
        }
        return $listaDePasajeros;
    }

}

function linea(){
    //una linea y salto de linea
    echo "=======================================\n";

}
