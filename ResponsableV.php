<?php
/*Entregable TP 2

Modificar la clase Viaje para que ahora los pasajeros sean un objeto que 
tenga los atributos nombre, apellido, numero de documento y teléfono.

El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero.

También se desea guardar la información de la persona responsable de realizar el viaje,
para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y
apellido.

La clase Viaje debe hacer referencia al responsable de realizar el viaje. 

Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub. */

class ResponsableV{

    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $this->nroEmpleado=$nroEmpleado;
        $this->nroLicencia=$nroLicencia;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }
 
    public function getNroEmpleado(){
        return $this->nroEmpleado;
    }

    public function setNroEmpleado($nroEmpleado){
        $this->nroEmpleado = $nroEmpleado;
    }

    public function getNroLicencia(){
        return $this->nroLicencia;
    }

    public function setNroLicencia($nroLicencia){
        $this->nroLicencia = $nroLicencia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function __toString()
    {
        return 
        "Nombre= ". $this->getNombre(). "\n".
        "Apellido= ". $this->getApellido(). "\n". 
        "Numero Empleado= ". $this->getNroEmpleado(). "\n".
        "Numero Licencia: ". $this->getNroLicencia(). "\n";
    }
}