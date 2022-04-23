<?php
include_once("Viaje.php");
include_once("Persona.php");
include_once("ResponsableV.php");


//todo esto es para inicializar una de ejemplo

$responsable1= new ResponsableV(null, null, null, null);
$viaje1=new Viaje(null,null,null,null, $responsable1);

$responsable1= new ResponsableV(15438, 548819731, "carlos", "villagran");

$viaje1= new Viaje(275, "BRAZIL", 3, $responsable1);

$pasajero1= new Persona("MARCOS", "AURELIO", 8649831, 158849231);
$pasajero2= new Persona("TOMAS", "ROJAS", 42165680, 15498246);
$pasajero3= new Persona("BRAULIO", "GARCIA", 16486297, 158849231);
$ListaDePasajeros1=array($pasajero1, $pasajero2, $pasajero3);

$viaje1->setPasajerosViaje($ListaDePasajeros1);

//hasta aca



do {
    echo "\n";
    linea();
    echo "Transportes VIAJE FELIZ.\n";
    linea();
    echo "Que quiere hacer?: \n";
    echo "1). Cargar informacion de un viaje.\n";
    echo "2). Modificar datos.\n";
    echo "3). Ver datos.\n";
    echo "4). Finalizar programa.\n";
    $respMainMenu=trim(fgets(STDIN));
    linea();
    switch ($respMainMenu) {
        case 1:
            $viaje1->reiniciarObj();
            //menu para la opcion 1) cargar informacion de un viaje
            //validacion para no dejar vacio el codigo de 
            echo "\nNecesita un responsable para el viaje. \n";
            //nombre del responsable
            do {//validacion para ingresar un nombre valido
                echo "\ningrese nombre del responsable: ";
                $nombResponsable= strtoupper(trim(fgets(STDIN)));
                if (is_numeric($nombResponsable)) {
                    echo "\nERROR: ingrese un numero valido.";
                }
            } while (is_numeric($nombResponsable));
            
            $viaje1->getResponsableV()->setNombre($nombResponsable);//agrego el nombre del responsable

            do {
                echo "\nIngrese apellido responsable: ";
                $apellResponsable= strtoupper(trim(fgets(STDIN)));
                if (is_numeric($apellResponsable)) {
                    echo "\nERROR ingrese un apellido valido.";
                }
            } while (is_numeric($apellResponsable));

            $viaje1->getResponsableV()->setApellido($apellResponsable);

            do {
                echo "\nIngrese N° empleado: ";
                $nroEmpResponsable= trim(fgets(STDIN));

                if (!(is_numeric($nroEmpResponsable))) {
                    echo "ERROR: ingrese un numero de empleado correspondiente.";
                }
            } while (!(is_numeric($nroEmpResponsable)));

            $viaje1->getResponsableV()->setNroEmpleado($nroEmpResponsable);

            do {
                echo "\nIngrese N° de licencia: ";
                $NlicenResponsable= trim(fgets(STDIN));
                if (!(is_numeric($NlicenResponsable))) {
                    echo "\nERROR: ingrese un numero de licencia correspondiente.";
                }
            } while (!(is_numeric($NlicenResponsable)));

            $viaje1->getResponsableV()->setNroLicencia($NlicenResponsable);

            do {
                echo "\nIngrese codigo de viaje: ";
                $codigoN=trim(fgets(STDIN));

                if (($codigoN==null) || !($codigoN == is_numeric($codigoN))) {
                echo "ERROR: debe ingresar un codigo numerico.\n";
            }
            } while (($codigoN==null) || !($codigoN == is_numeric($codigoN)));
            //validacion para ingresar detino del viaje
            do {
                echo "\nIngrese destino del viaje: ";
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
                if (($cantMaxPasajerosN==null) || !($cantMaxPasajerosN == is_numeric($cantMaxPasajerosN))) {
                echo "ERROR: debe ingresar una cantidad maxima de pasajeros(numero).\n";
            }
            } while (($cantMaxPasajerosN==null) || !($cantMaxPasajerosN == is_numeric($cantMaxPasajerosN)));
        
            //seteo todo
            $viaje1->setCodigo($codigoN);
            $viaje1->setDestino($destinoN);
            $viaje1->setCantMaxPasajeros($cantMaxPasajerosN);
            echo "\nQuiere ingresar un pasajero?(si/no): ";
            //usa strtoupper para evitar errores por las minusculas
            do {
                $siNo=strtoupper(trim(fgets(STDIN)));
                if (($siNo <> "SI") && ($siNo <> "NO")) {
                    echo "\nERROR: ingrese una opcion valida(si/no): ";
                }
            } while (($siNo <> "SI") && ($siNo <> "NO"));
                if ($siNo=="SI") {
                    // un do while pasa poner tantos pasajeros como quiera
                    $i=1;
                    do {
                        //uso strouper para pasar el nombre y apellido a mayusculas
                        echo "\nNombre: ";
                        $nombreN=strtoupper(trim(fgets(STDIN)));
                        echo "\nApellido: ";
                        $apellidoN=strtoupper(trim(fgets(STDIN)));
                        

                        //validacion para ingresar un numero en documento
                        $cantidadPasajeros= count($viaje1->getPasajerosViaje());
                        do {
                            echo "\nDocumento: ";
                            $documentoN=trim(fgets(STDIN));

                            if (!(is_numeric($documentoN))) {
                                echo "ERROR: ingrese un numero de documento\n";

                            }
                            $encontrado= $viaje1->hayPasajeroRepetido($documentoN);
                            
                            if ($encontrado) {
                                echo "ERROR: este pasajero ya existe";
                            }
                            
                        } while (!(is_numeric($documentoN)) || ($encontrado));

                        echo "\nTelefono: ";
                        //validacion para ingresar un numero en telefono
                        do {
                            $telefonoN=trim(fgets(STDIN));
                            if (!(is_numeric($telefonoN))) {
                                echo "ERROR: ingrese un numero de telefono\n";
                            }

                        } while (!(is_numeric($telefonoN)));
                        
                        //inicializo la clase persona nueva
                        $Persona= new Persona($nombreN, $apellidoN, $documentoN,$telefonoN);

                        $auxListaPasajeros=$viaje1->getPasajerosViaje();
                        
                        array_push($auxListaPasajeros, $Persona);

                        $viaje1->setPasajerosViaje($auxListaPasajeros);
                
                        echo "\nPasajeros: ". count($viaje1->getPasajerosViaje()). " de ". $viaje1->getCantMaxPasajeros(). " disponibles\n";
                        echo "Quiere ingresar otro pasajero?(si/no): ";
                        do {
                            $siNo=strtoupper(trim(fgets(STDIN)));
                            if (($siNo <> "SI") && ($siNo <> "NO")) {
                                echo "\nIngrese una opcion valida(si/no): ";
                            }
                        } while (($siNo <> "SI") && ($siNo <> "NO"));
                        //validacion en caso de ingresar mas pasajeros de los posibles
                        $i=$i+1;
                        if (($cantMaxPasajerosN)< $i) {
                            echo "ERROR: ah alcanzado el maximo de pasajeros";
                        } 
                        
                    } while ((($cantMaxPasajerosN)>=$i)&& ($siNo=="SI"));
                }
            break;
        case 2:
            //menu para 2) modificar datos
            do {
                echo "\nQue quiere modificar?\n";
                linea();
                echo "\n1). Codigo del viaje.";
                echo "\n2). Destino del viaje.";
                echo "\n3). Cantidad maxima de pasajeros (no puede ser menor a la actual).";
                echo "\n4). Modificar pasajeros.";
                echo "\n5). modificar datos del responsable.";
                echo "\n6). Terminar de modificar.\n";
                $respuesta=trim(fgets(STDIN));
                // validacion por sino ingresa un numero entre 1 o 3 por eso el do while
                if (!(is_int($respuesta)) && !($respuesta>=0) && !($respuesta<=6)) {
                    echo "\nERROR: ingrese un numero entre 1 y 5";
                }
            } while (!(is_int($respuesta)) && !($respuesta>=0) && !($respuesta<=5));
                
            if ($respuesta==1) {
                //1)codigo de viaje
                echo "\nCodigo de viaje actual: ". $viaje1->getCodigo();
                do {
                    echo "\nIngrese el codigo nuevo a cambiar: ";
                    $aux=trim(fgets(STDIN));
                
                    if (($aux==null) || !($aux == is_numeric($aux))) {
                        echo "ERROR: debe ingresar un numero";
                    }
                $viaje1->setCodigo($aux);
                } while (($aux==null) || !($aux == is_numeric($aux)));
                
            }
            elseif($respuesta==2){
                //2) destino de viaje
                do {
                    echo "\nDestino de viaje actual: ". $viaje1->getDestino();
                    echo "\nIngrese el destino a cambiar: ";
                    $aux=trim(fgets(STDIN));
                    if (($aux==null) || ($aux == is_numeric($aux))) {
                        echo "\nERROR: debe ingresar un nombre(no numero)";
                    }
                } while (($aux==null) || ($aux == is_numeric($aux)));
                

                $viaje1->setDestino($aux);
            }
            elseif ($respuesta==3) {
                //3)cant maxima de pasajeros
                // pongo un do while para que repita el proceso en caso de ingresar un numero menor a la cantidad actual de pasajeros
                do {
                    echo "\nLa cantidad maxima de pasajeros: ". $viaje1->getCantMaxPasajeros();
                    echo "\nCantidad de pasajeros actuales: ". count($viaje1->getPasajerosViaje());
                    echo "\nIngrese la nueva cantidad de pasajeros maxima: ";
                    $respuestaN=trim(fgets(STDIN));
                    if (!($respuesta==is_numeric($respuesta)) || ($respuestaN <= (count($viaje1->getPasajerosViaje())))) {
                        echo "ERROR: ingrese un numero no menor al actual.\n";
                    }
                } while (!($respuesta==is_numeric($respuesta)) || ($respuestaN <= (count($viaje1->getPasajerosViaje()))));
                $viaje1->setCantMaxPasajeros($respuestaN);
            }
            elseif ($respuesta==4) {
                //4)modificar pasajeros
                do {
                    linea();
                    echo "MODIFICAR PASAJEROS\n";
                    linea();
                    echo "1) Ingresar pasajero nuevo.\n";
                    echo "2) Eliminar pasajero.\n";
                    echo "3) Modificar pasajero.\n";
                    echo "4) Dejar de modificat\n";
                    $respuesta= trim(fgets(STDIN));
                    if (($respuesta > 4) && ($respuesta < 1) && !(is_int($respuesta))) {
                        echo "ERROR: ingrese un numero valido\n";
                    }
                } while (($respuesta > 4) && ($respuesta < 1) && !(is_int($respuesta)));
                
                if ($respuesta == 1) {
                    /**
                     * 1)ingresa 1 pasajero
                     */
                    $pasajerosAct= count($viaje1->getPasajerosViaje());
                    if (!($pasajerosAct < ($viaje1->getCantMaxPasajeros()))) {
                    echo "\nERROR: cantidad maxima de pasajeros exedida.";
                    } 
                    else {
                    echo "\nCantidad actual de pasajeros: ". (count($viaje1->getPasajerosViaje()));
                    echo "\nCantidad de pasajeros maximo: ". ($viaje1->getCantMaxPasajeros()). "\n";
                    linea();
                    echo "\nIngrese el nombre del nuevo pasajero: ";
                    $nombreN=strtoupper(trim(fgets(STDIN)));
                    echo "\nIngrese apellido del nuevo pasajero: ";
                    $apellidoN= strtoupper(trim(fgets(STDIN)));
                    echo "\nIngrese documento del nuevo pasajero: ";
                    $documentoN= strtoupper(trim(fgets(STDIN)));
                    //pusheo al array
                    $viaje1->agregarPasajero($nombreN, $apellidoN, $documentoN);
                    }
                    
                }
                elseif($respuesta==2){
                    do {
                        //2) eliminar pasajero.

                        echo "\nCantidad actual de pasajeros: ". (count($viaje1->getPasajerosViaje()));
                        echo "\nCantidad actual maxima de pasajeros: ". ($viaje1->getCantMaxPasajeros());
                        echo "\nIngrese numero de pasajero: ";
                        $pasajeroN= trim(fgets(STDIN));
                        //validacion para poner un numero correcto
                        if (($pasajeroN > (count($viaje1->getPasajerosViaje()))) || ($pasajeroN > $viaje1->getCantMaxPasajeros()) || !($pasajeroN == is_numeric($pasajeroN))) {
                            echo "\nERROR: el numero de pasajero no existe o fue ingresado incorrectamente.";
                        }
                    } while (($pasajeroN > (count($viaje1->getPasajerosViaje()))) || ($pasajeroN > $viaje1->getCantMaxPasajeros()) || !($pasajeroN == is_numeric($pasajeroN)));
                    
                    echo "\nPasajero n°: ". $pasajeroN . "\n". $viaje1->getPasajerosViaje()[$pasajeroN-1] . "\n";
                    linea();
                    echo "Desea eliminar este pasajero?(si/no): ";
                    $respuesta=strtoupper(trim(fgets(STDIN)));
                    if ($respuesta== "SI") {
                        $viaje1->eliminarPasajero($pasajeroN);
                    }
                    elseif ($respuesta=="NO") {
                        //no pasa nada vuelve a empezar desde el menu
                    }  
                }
                elseif ($respuesta==3) {
                    //3)modificar pasajero
                    do {
                        echo "\nCantidad actual de pasajeros: ". (count($viaje1->getPasajerosViaje()));
                        echo "\nCantidad actual maxima de pasajeros: ". ($viaje1->getCantMaxPasajeros());
                        echo "\nIngrese numero de pasajero: ";
                        $pasajeroN= trim(fgets(STDIN));
                        //validacion para poner un numero correcto
                        if (($pasajeroN > (count($viaje1->getPasajerosViaje()))) ||  !(is_numeric($pasajeroN))) {
                            echo "\nERROR: el numero de pasajero no existe o fue ingresado incorrectamente.";
                        }
                    } while (($pasajeroN > (count($viaje1->getPasajerosViaje()))) || !(is_numeric($pasajeroN)));
                    //datos nuevos del pasajero
                    linea();
                    echo "PASAJERO N°: ". $pasajeroN. "\n";
                    linea();
                    /*echo "\nNombre: ". $viaje1->darNombrePasajero($pasajeroN);
                    echo "\nApellido: ". $viaje1->darApellidoPasajero($pasajeroN);
                    echo "\nDocumento: ". $viaje1->darNroDeDocPasajero($pasajeroN). "\n";
                    linea();
                    */
                    echo $viaje1->getPasajerosViaje()[$pasajeroN-1];
                    echo "\nDATOS NUEVOS A MODIFICAR\n";
                    linea();
                    //pido los nuevos datos
                    echo "\nNombre nuevo: ";
                    $nombreN=strtoupper(trim(fgets(STDIN)));
                    echo "\nApellido nuevo: ";
                    $apellidoN=strtoupper(trim(fgets(STDIN)));
                    $totalPasajeros=count($viaje1->getPasajerosViaje());
                    do {
                        echo "\nDocumento nuevo: ";
                        $documentoN= trim(fgets(STDIN));

                        if (!(is_numeric($documentoN))) {
                            echo "ERROR: ingrese un numero de documento valido\n";
                        }
                        $encontrado= $viaje1->hayPasajeroRepetido($documentoN);
                        if ($encontrado) {
                            echo "ERROR: este pasajero ya existe ingrese otro\n";
                        }

                    } while (($encontrado==true) || !(is_numeric($documentoN)));
                    
                    
                    
                    
                    
                    echo "\nTelefono: ";
                    $telefonoN= trim(fgets(STDIN));
                    //cambio los nombres
                    //$viaje1->cambiarNombrePasajero($nombreN, $pasajeroN);
                    //nombre
                    ($viaje1->getPasajerosViaje()[$pasajeroN-1])->setNombre($nombreN);
                    //apellido
                    ($viaje1->getPasajerosViaje()[$pasajeroN-1])->setApellido($apellidoN);
                    //DNI
                    ($viaje1->getPasajerosViaje()[$pasajeroN-1])->setDNI($documentoN);
                    //telefono
                    ($viaje1->getPasajerosViaje()[$pasajeroN-1])->setTelefono($telefonoN);
                    
                    echo "\nDatos cambiados.";
                    }
                
                elseif ($respuesta==4) {
                    //termina
                }
            }
            elseif ($respuesta==5) {
                //muestro datos del responsable actual
                echo "\n=======================================\n".
                "RESPONSABLE ACTUAL". 
                "\n=======================================\n". 
                $viaje1->getResponsableV();
                //pido nuevos datos a modificar
                do {//validacion para ingresar un nombre valido
                    echo "\ningrese nombre del NUEVO responsable: ";
                    $nombResponsable= strtoupper(trim(fgets(STDIN)));
                    if (is_numeric($nombResponsable)) {
                        echo "\nERROR: ingrese un nombre valido.";
                    }
                } while (is_numeric($nombResponsable));
                
                $viaje1->getResponsableV()->setNombre($nombResponsable);//agrego el nombre del responsable
    
                do {
                    echo "\nIngrese apellido del NUEVO responsable: ";
                    $apellResponsable= strtoupper(trim(fgets(STDIN)));
                    if (is_numeric($apellResponsable)) {
                        echo "\nERROR ingrese un apellido valido.";
                    }
                } while (is_numeric($apellResponsable));
    
                $viaje1->getResponsableV()->setApellido($apellResponsable);
    
                do {
                    echo "\nIngrese NUEVO N° empleado: ";
                    $nroEmpResponsable= trim(fgets(STDIN));
    
                    if (!(is_numeric($nroEmpResponsable))) {
                        echo "ERROR: ingrese un numero de empleado correspondiente.";
                    }
                } while (!(is_numeric($nroEmpResponsable)));
    
                $viaje1->getResponsableV()->setNroEmpleado($nroEmpResponsable);
    
                do {
                    echo "\nIngrese NUEVO N° de licencia: ";
                    $NlicenResponsable= trim(fgets(STDIN));
                    if (!(is_numeric($NlicenResponsable))) {
                        echo "\nERROR: ingrese un numero de licencia correspondiente.";
                    }
                } while (!(is_numeric($NlicenResponsable)));
    
                $viaje1->getResponsableV()->setNroLicencia($NlicenResponsable);
                
                echo "\n CAMBIOS REALIZADOS \n";
            }
            break;
        case 3:
            //3)mostrar datos
            echo "1). mostrar un pasajero en especifico.\n";
            echo "2). mostrar toda la lista de los pasajeros.\n";
            echo "3). mostrar datos del viaje.\n";
            echo "4). mostrar datos del responsable\n";
            
            $respuesta=trim(fgets(STDIN));
            if ($respuesta==1){
                //1). mostrar un pasajero en especifico
                do {
                    echo "ingrese el numero de pasajero: ";
                $nroPasajeroN=trim(fgets(STDIN));
                if (($nroPasajeroN > (count($viaje1->getPasajerosViaje()))) && ($nroPasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($nroPasajeroN))) {
                    echo "\nERROR: el numero de pasajero no existe o fue ingresado incorrectamente.";
                }
                } while (($nroPasajeroN > (count($viaje1->getPasajerosViaje()))) && ($nroPasajeroN > $viaje1->getPasajerosViaje()) && !(is_int($nroPasajeroN)));
                //doy datos del pasajero con una funcion
                echo $viaje1->darDatosPasajero($nroPasajeroN);

            } elseif ($respuesta==2) {
                //2) mostrar lista de pasajeros
                echo $viaje1->listaDePasajeros();
            } elseif ($respuesta==3) {
                //3)mostrar datos del viaje
                linea();
                echo "DATOS DEL VIAJE\n";
                linea();
                echo "Codigo: ". $viaje1->getCodigo(). "\n";
                echo "Destino: ". $viaje1->getDestino(). "\n";
                echo "Cantadidad maxima de pasajeros: ". $viaje1->getCantMaxPasajeros() . "\n";
                echo "Responsable del viaje " . $viaje1->getResponsableV()->getNombre(). " " . $viaje1->getResponsableV()->getApellido();
                /* esto lo hago porque el count me toma el [0] vacio como un pasajero aunque este vacio */
                if (($viaje1->getPasajerosViaje()[0]) == null) {
                    echo "Pasajero actuales: ". 0;
                }
                else {
                    echo "\nPasajeros actuales: ". count($viaje1->getPasajerosViaje());
                }
            }
            elseif ($respuesta==4) {
                echo "\n=======================================\n".
                "DATOS DEL RESPONSABLE". 
                "\n=======================================\n".
                $viaje1->getResponsableV();
            }
            break;
        case 4:
            echo "\nFIN PROGRAMA.";
            break;
    }
} while ($respMainMenu<>4);
//prueba
