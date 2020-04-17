<?php
require_once "inter.php";

class pais implements inter{

    public $nombre;
    public $continente;
    public $idioma;
    //Constructor
    function __construct($nombre,$continente,$idioma){
        $this->nombre = $nombre;
        $this->continente = $continente;
        $this->idioma = $idioma;
    }
    
   public function setter($nombree){
       $this->nombre = $nombree;
   }
    public function mostrarDatosPais()
    {
        echo $this->nombre. "-----------" .$this->continente. "-----------" . $this->idioma . "</br>";
    }
}
