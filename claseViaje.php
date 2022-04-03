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
    //funciones extras
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
    public function __toString()
    {

        return "codigo:". $this->getCodigo(). "\n". "destino: ". $this->getDestino(). "\n". "cantidad maxima de pasajeros: " . $this->getCantMaxPasajeros(). "\n". print_r($this->getPasajerosViaje());
    }
}
$pasajeroN[0]=array('nombre' => null, 'apellido'=> null , 'documento'=>null);
$viaje1=new Viaje(null,null,null,$pasajeroN);

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
do {
    echo "\n";
    linea();
    echo "transportes VIAJE FELIZ.\n";
    linea();
    echo "que quiere hacer?: \n";
    echo "1). cargar informacion de un viaje.\n";
    echo "2). modificar datos.\n";
    echo "3). ver datos.\n";
    echo "4). finalizar programa.\n";
    $respMainMenu=trim(fgets(STDIN));
    linea();
    switch ($respMainMenu) {
        case 1:
            reiniciarObj($viaje1);
            //menu para la opcion 1) cargar informacion de un viaje
            echo "ingrese codigo de viaje: ";
            $codigoN=trim(fgets(STDIN));
            echo "\ningrese destino del viaje: ";
            $destinoN=strtoupper(trim(fgets(STDIN)));
            echo "\ningrese cantidad maxima de pasajeros permitidos en el viaje: ";
            $cantMaxPasajerosN=trim(fgets(STDIN));
            //seteo todo
            $viaje1->setCodigo($codigoN);
            $viaje1->setDestino($destinoN);
            $viaje1->setCantMaxPasajeros($cantMaxPasajerosN);
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
                        $viaje1->cambiarNombrePasajero($nombreN, $i);
                        $viaje1->cambiarApellidoPasajero($apellidoN, $i);
                        $viaje1->cambiarDocumentoPasajero($documentoN, $i);
                        
                        echo "\npasajeros: ". count($viaje1->getPasajerosViaje()). " de ". $viaje1->getCantMaxPasajeros(). " disponibles\n";
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
            break;
        case 2:
            //menu para 2) modificar datos
            do {
                echo "\nque quiere modificar?";
                linea();
                echo "\n1). codigo del viaje.";
                echo "\n2). destido del viaje.";
                echo "\n3). cantidad maxima de pasajeros (no puede ser menor a la actual).";
                echo "\n4). modificar pasajeros.";
                echo "\n5). terminar de modificar.";
                $respuesta=trim(fgets(STDIN));
                // validacion por sino ingresa un numero entre 1 o 3 por eso el do while
                if (!(is_int($respuesta)) && !($respuesta>=0) && !($respuesta<=4)) {
                    echo "\nerror: ingrese un numero entre 1 y 4";
                }
            } while (!(is_int($respuesta)) && !($respuesta>=0) && !($respuesta<=5));
                
            if ($respuesta=1) {
                //1)codigo de viaje
                echo "\ncodigo de viaje actual: ". $viaje1->getCodigo();
                echo "\ningrese el codigo nuevo a cambiar: ";
                $viaje1->setCodigo(trim(fgets(STDIN)));
            }
            elseif($respuesta=2){
                //2) destino de viaje
                echo "\ndestino de viaje actual: ". $viaje1->getDestino();
                echo "\ningrese el destino a cambiar: ";
                $viaje1->setDestino(trim(fgets(STDIN)));
            }
            elseif ($respuesta=3) {
                //3)cant maxima de pasajeros
                // pongo un do while para que repita el proceso en caso de ingresar un numero menor a la cantidad actual de pasajeros
                do {
                    echo "\nla cantidad maxima de pasajeros: ". $viaje1->getCantMaxPasajeros();
                    echo "\ncantidad de pasajeros actuales: ". count($viaje1->getPasajerosViaje());
                    echo "\ningrese la nueva cantidad de pasajeros: ";
                    $respuestaN=trim(fgets(STDIN));
                    $respuestaN=$respuestaN-1;
                    if ( !(is_int($respuesta)) && !($respuestaN <= (count($viaje1->getPasajerosViaje())))) {
                        echo "error: ingrese un numero no menor al actual";
                    }
                } while ( !(is_int($respuesta)) && !($respuestaN <= (count($viaje1->getPasajerosViaje()))));
            }
            elseif ($respuesta=4) {
                //4)modificar pasajeros
                do {
                    linea();
                    echo "MODIFICAR PASAJEROS";
                    linea();
                    echo "1) ingresar pasajero nuevo.\n";
                    echo "2) eliminar pasajero.\n";
                    echo "3) modificar pasajero.\n";
                    echo "4) dejar de modificar.\n";
                    $respuesta= trim(fgets(STDIN));
                    if (($respuesta > 4) && ($respuesta < 1) && !(is_int($respuesta))) {
                        echo "error: ingrese un numero valido\n";
                    }
                } while (($respuesta > 3) && ($respuesta < 1) && !(is_int($respuesta)));
                
                if ($respuesta == 1) {
                    //1) ingresar pasajero
                    $pasajerosAct= count($viaje1->getPasajerosViaje());
                    if (!($pasajerosAct <= ($viaje1->getCantMaxPasajeros()))) {
                        echo "\nerror: cantidad maxima de pasajeros exedida.";
                    } 
                    else {
                        echo "\ncantidad actual de pasajeros: ". (count($viaje1->getPasajerosViaje()));
                        echo "\ncantidad de pasajeros maximo: ". ($viaje1->getCantMaxPasajeros());
                        linea();
                        echo "\ningrese el nombre del nuevo pasajero: ";
                        $nombreN=strtoupper(trim(fgets(STDIN)));
                        echo "\ningrese apellido del nuevo pasajero: ";
                        $apellidoN= strtoupper(trim(fgets(STDIN)));
                        echo "\ningrese documento del nuevo pasajero: ";
                        $documentoN= strtoupper(trim(fgets(STDIN)));
                        array_push($viaje1->getPasajerosViaje(), ['nombre'=>$nombreN, 'apellido'=>$apellidoN, 'documento'=>$documentoN]);  
                    }
                }
                elseif($respuesta==2){
                    do {
                        //2) eliminar pasajero.

                        echo "\ncantidad actual de pasajeros: ". (count($viaje1->getPasajerosViaje()));
                        echo "\ncantidad actual maxima de pasajeros: ". ($viaje1->getCantMaxPasajeros());
                        echo "\ningrese numero de pasajero: ";
                        $pasajeroN= trim(fgets(STDIN));
                        //validaacion para poner un numero correcto
                        if (($pasajeroN > (count($viaje1->getPasajerosViaje()))) && ($pasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($pasajeroN))) {
                            echo "\nerror: el numero de pasajero no existe o fue ingresado incorrectamente.";
                        }
                    } while (($pasajeroN > (count($viaje1->getPasajerosViaje()))) && ($pasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($pasajeroN)));
                    
                    //eliminacion de pasajero
                    echo "\npasajero n°: ". $pasajeroN;
                    echo "\nnombre: ". $viaje1->darNombrePasajero($pasajeroN);
                    echo "\napellido: ". $viaje1->darApellidoPasajero($pasajeroN);
                    echo "\ndocumento: ". $viaje1->darNroDeDocPasajero($pasajeroN);
                    linea();
                    echo "desea eliminar este pasajero?(si/no): ";
                    $respuesta=strtoupper(trim(fgets(STDIN)));
                    if ($respuesta== "SI") {
                        $nuevoArray= array_splice($viaje1->getPasajerosViaje(), $pasajeroN, 1);
                        $viaje1->setPasajerosViaje($nuevoArray);
                        echo "\nnueva cantidad de pasajeros: ". count($viaje1->getPasajerosViaje());
                    }
                    elseif ($respuesta=="NO") {
                        //no pasa nada vuelve a empezar
                    }  
                }
                elseif ($respuesta==3) {
                    //3)modificar pasajero
                    do {
                        echo "\ncantidad actual de pasajeros: ". (count($viaje1->getPasajerosViaje()));
                        echo "\ncantidad actual maxima de pasajeros: ". ($viaje1->getCantMaxPasajeros());
                        echo "\ningrese numero de pasajero: ";
                        $pasajeroN= trim(fgets(STDIN));
                        //validacion para poner un numero correcto
                        if (($pasajeroN > (count($viaje1->getPasajerosViaje()))) && ($pasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($pasajeroN))) {
                            echo "\nerror: el numero de pasajero no existe o fue ingresado incorrectamente.";
                        }
                    } while (($pasajeroN > (count($viaje1->getPasajerosViaje()))) && ($pasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($pasajeroN)));
                    //datos nuevos del pasajero
                    linea();
                    echo "\nPASAJERO N°: ". $pasajeroN;
                    linea();
                    echo "\nnombre: ". $viaje1->darNombrePasajero($pasajeroN);
                    echo "\napellido: ". $viaje1->darApellidoPasajero($pasajeroN);
                    echo "\ndocumento: ". $viaje1->darNroDeDocPasajero($pasajeroN);
                    linea();
                    echo "\nDATOS NUEVOS A MODIFICAR";
                    linea();
                    echo "\nnombre nuevo: ";
                    $nombreN=strtoupper(trim(fgets(STDIN)));
                    echo "\napellido nuevo: ";
                    $apellidoN=strtoupper(trim(fgets(STDIN)));
                    echo "\ndocumento nuevo: ";
                    $documentoN= strtoupper(trim(fgets(STDIN)));
                    //cambio los nombres
                    $viaje1->cambiarNombrePasajero($nombreN, $pasajeroN);
                    $viaje1->cambiarApellidoPasajero($apellidoN, $pasajeroN);
                    $viaje1->cambiarDocumentoPasajero($documentoN, $pasajeroN);
                    echo "\nDatos cambiados.";
                }
            }    
                $viaje1->setCantMaxPasajeros($respuestaN);
            break;
        case 3:
            echo "1). mostrar un pasajero en especifico.\n";
            echo "2). mostrar toda la lista de los pasajeros.\n";
            
            $respuesta=trim(fgets(STDIN));
            if ($respuesta==1){
                //1). mostrar un pasajero en especifico
                do {
                    echo "1). ingrese el numero de pasajero";
                $nroPasajeroN=trim(fgets(STDIN));
                if (($nroPasajeroN > (count($viaje1->getPasajerosViaje()))) && ($nroPasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($nroPasajeroN))) {
                    echo "\nerror: el numero de pasajero no existe o fue ingresado incorrectamente.";
                }
                } while (($pasajeroN > (count($viaje1->getPasajerosViaje()))) && ($pasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($pasajeroN)));
                //doy datos del pasajero con una funcion
                $viaje1->darDatosPasajero($nroPasajeroN);

            } elseif ($respuesta==2) {
                //2) mostrar lista de pasajeros
                $viaje1->mostrarlistaPasajeros();
            }
            break;
        case 4:
            echo "fin programa";
            break;


    }
} while ($respMainMenu<>4);