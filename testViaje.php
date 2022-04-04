<?php
include_once("claseViaje.php");

//inicio el objeto
$pasajeroN[0]=array('nombre' => null, 'apellido'=> null , 'documento'=>null);
$viaje1=new Viaje(null,null,null,$pasajeroN);
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
                if ($destinoN==null) {
                    echo "ERROR: debe ingresar un destino\n";
                }
            } while ($destinoN==null);
            do {
                echo "\ningrese cantidad maxima de pasajeros permitidos en el viaje: ";
                $cantMaxPasajerosN=trim(fgets(STDIN));
                if ($cantMaxPasajerosN==null) {
                    echo "ERROR: debe ingresar una cantidad maxima de pasajeros.\n";
                }
            } while ($cantMaxPasajerosN==null);
            
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
                echo "\nque quiere modificar?\n";
                linea();
                echo "\n1). codigo del viaje.";
                echo "\n2). destino del viaje.";
                echo "\n3). cantidad maxima de pasajeros (no puede ser menor a la actual).";
                echo "\n4). modificar pasajeros.";
                echo "\n5). terminar de modificar.\n";
                $respuesta=trim(fgets(STDIN));
                // validacion por sino ingresa un numero entre 1 o 3 por eso el do while
                if (!(is_int($respuesta)) && !($respuesta>=0) && !($respuesta<=5)) {
                    echo "\nerror: ingrese un numero entre 1 y 5";
                }
            } while (!(is_int($respuesta)) && !($respuesta>=0) && !($respuesta<=5));
                
            if ($respuesta==1) {
                //1)codigo de viaje
                echo "\ncodigo de viaje actual: ". $viaje1->getCodigo();
                echo "\ningrese el codigo nuevo a cambiar: ";
                $viaje1->setCodigo(trim(fgets(STDIN)));
            }
            elseif($respuesta==2){
                //2) destino de viaje
                echo "\ndestino de viaje actual: ". $viaje1->getDestino();
                echo "\ningrese el destino a cambiar: ";
                $viaje1->setDestino(trim(fgets(STDIN)));
            }
            elseif ($respuesta==3) {
                //3)cant maxima de pasajeros
                // pongo un do while para que repita el proceso en caso de ingresar un numero menor a la cantidad actual de pasajeros
                do {
                    echo "\nla cantidad maxima de pasajeros: ". $viaje1->getCantMaxPasajeros();
                    echo "\ncantidad de pasajeros actuales: ". count($viaje1->getPasajerosViaje());
                    echo "\ningrese la nueva cantidad de pasajeros maxima: ";
                    $respuestaN=trim(fgets(STDIN));
                    if ( !(is_int($respuestaN)) && ($respuestaN <= (count($viaje1->getPasajerosViaje())))) {
                        echo "error: ingrese un numero no menor al actual.\n";
                    }
                } while ( !(is_int($respuestaN)) && $respuestaN <= (count($viaje1->getPasajerosViaje())));
                $viaje1->setCantMaxPasajeros($respuesta);
            }
            elseif ($respuesta==4) {
                //4)modificar pasajeros
                do {
                    linea();
                    echo "MODIFICAR PASAJEROS\n";
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
                    if (!($pasajerosAct < ($viaje1->getCantMaxPasajeros()))) {
                        echo "\nerror: cantidad maxima de pasajeros exedida.";
                    } 
                    else {
                        echo "\ncantidad actual de pasajeros: ". (count($viaje1->getPasajerosViaje()));
                        echo "\ncantidad de pasajeros maximo: ". ($viaje1->getCantMaxPasajeros()). "\n";
                        linea();
                        echo "\ningrese el nombre del nuevo pasajero: ";
                        $nombreN=strtoupper(trim(fgets(STDIN)));
                        echo "\ningrese apellido del nuevo pasajero: ";
                        $apellidoN= strtoupper(trim(fgets(STDIN)));
                        echo "\ningrese documento del nuevo pasajero: ";
                        $documentoN= strtoupper(trim(fgets(STDIN)));
                        //pusheo al array
                        $aux=$viaje1->getPasajerosViaje();
                        array_push($aux, ['nombre'=>$nombreN, 'apellido'=>$apellidoN, 'documento'=>$documentoN]);  
                        $viaje1->setPasajerosViaje($aux);

                    }
                }
                elseif($respuesta==2){
                    do {
                        //2) eliminar pasajero.

                        echo "\ncantidad actual de pasajeros: ". (count($viaje1->getPasajerosViaje()));
                        echo "\ncantidad actual maxima de pasajeros: ". ($viaje1->getCantMaxPasajeros());
                        echo "\ningrese numero de pasajero: ";
                        $pasajeroN= trim(fgets(STDIN));
                        //validacion para poner un numero correcto
                        if (($pasajeroN > (count($viaje1->getPasajerosViaje()))) && ($pasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($pasajeroN))) {
                            echo "\nerror: el numero de pasajero no existe o fue ingresado incorrectamente.";
                        }
                    } while (($pasajeroN > (count($viaje1->getPasajerosViaje()))) && ($pasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($pasajeroN)));
                    
                    //eliminacion de pasajero
                    echo "\npasajero n°: ". $pasajeroN;
                    echo "\nnombre: ". $viaje1->darNombrePasajero($pasajeroN);
                    echo "\napellido: ". $viaje1->darApellidoPasajero($pasajeroN);
                    echo "\ndocumento: ". $viaje1->darNroDeDocPasajero($pasajeroN). "\n";
                    linea();
                    echo "desea eliminar este pasajero?(si/no): ";
                    $respuesta=strtoupper(trim(fgets(STDIN)));
                    if ($respuesta== "SI") {

                        $nuevoArray=$viaje1->getPasajerosViaje();
                        array_splice($nuevoArray, ($pasajeroN-1), 1);
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
            break;
        case 3:
            echo "1). mostrar un pasajero en especifico.\n";
            echo "2). mostrar toda la lista de los pasajeros.\n";
            echo "3). mostrar datos del viaje.\n";
            
            $respuesta=trim(fgets(STDIN));
            if ($respuesta==1){
                //1). mostrar un pasajero en especifico
                do {
                    echo "ingrese el numero de pasajero: ";
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
            } elseif ($respuesta==3) {
                //3)mostrar datos del viaje
                linea();
                echo "DATOS DEL VIAJE\n";
                linea();
                echo "codigo: ". $viaje1->getCodigo(). "\n";
                echo "Destino: ". $viaje1->getDestino(). "\n";
                echo "Cantadidad maxima de pasajeros: ". $viaje1->getCantMaxPasajeros() . "\n";
                /* esto lo hago porque el count me toma el [0] vacio como un pasajero aunque este vacio */
                if (($viaje1->getPasajerosViaje()[0]['nombre']) == null) {
                    echo "Pasajero actuales: ". 0;
                }
                else {
                    echo "Pasajeros actuales: ". count($viaje1->getPasajerosViaje());
                }
            }
            break;
        case 4:
            echo "\nFIN PROGRAMA.";
            break;
    }
} while ($respMainMenu<>4);
