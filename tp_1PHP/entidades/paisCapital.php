<?php

class paisCapital extends pais 
{   
    public $capital;

    function __construct($nombre,$capital,$continente,$idioma)
    {   parent::__construct($nombre,$continente,$idioma);
        $this->capital=$capital;
    }
    
    public function mostrar()
    {
        return $this->mostrarDatosPais();
    }
    public static function mostrarPaisCapital($paisCapital)
    {
        return $paisCapital->mostrar();
    }
}