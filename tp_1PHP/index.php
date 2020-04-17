<?php

require_once __DIR__ . '/vendor/autoload.php';
include_once ("./entidades/pais.php");
include_once ("./entidades/paisRegion.php");
include_once ("./entidades/paisCapital.php");

use NNV\RestCountries;
$contador = 0;
$restCountries = new RestCountries;

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    switch ($_SERVER['PATH_INFO']) {
        case '/region':
            //las regiones que funcionan son , ASIA OCEANIA Y AFRICA, el resto no funciona por problema del paquete.
            if($restCountries->byRegion($_GET['tipo']) != null)
            {
                $pais = $restCountries->byRegion($_GET['tipo']);
                for($i=0;$i<count($pais);$i++)
                {
                    $capital = $pais[$i]->capital;
                    $nombre = $pais[$i]->name;
                    $idioma = $pais[$i]->languages;
                    $continente = $pais[$i]->region;
                    $subRegion = $pais[$i]->subregion;
                  
                    $paisCapital = new paisRegion($nombre,$capital,$continente,$idioma[0]->nativeName,$subRegion); 
                    paisRegion::mostrarPaisRegion($paisCapital);
                }
            }
            
            # code...
            break;
        case '/capital':
            
            if($restCountries->byCapitalCity($_GET['tipo']) != null)
            {
                $pais = $restCountries->byCapitalCity($_GET['tipo']);
                
                $paisCapital = new paisCapital($pais[0]->name,$pais[0]->capital,$pais[0]->region,$pais[0]->languages[0]->nativeName);
                paisCapital::mostrarPaiScapital($paisCapital);
            }
        break;
        case '/pais':   
            if($restCountries->byName($_GET['tipo'], true) != null)
            {
                    $pais = $restCountries->byName($_GET['tipo']);
                    
                    $nombre = $pais[0]->name;
                    $idioma = $pais[0]->languages;
                    $continente = $pais[0]->region;
                    $pais = new pais($pais[0]->name,$pais[0]->region,$pais[0]->languages[0]->nativeName);
                    $pais->mostrarDatosPais();
            }
        break; 
        default:
            # code...
            break;
    }
}