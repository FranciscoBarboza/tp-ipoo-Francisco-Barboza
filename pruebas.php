<?php
class prueba{
    public function __toString()
    {
        return get_called_class();
    }
}
class prueba2 extends prueba{
    public function __toString(){
        return get_called_class();
    }
}
$prueba=new prueba;
echo $prueba;

$prueba2= new prueba2;
echo "\n". $prueba2;




