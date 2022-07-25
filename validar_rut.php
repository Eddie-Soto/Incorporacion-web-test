<?php

/**
 * Comprueba si el rut ingresado es valido
 *
 * @param $rut string
 * @return true o false
 este 12518142-2 si e svalido

 Validos
9685338-6
2681977-6


Falso

12403123-5
2681977-1

 */
$rut = $_GET["rut"];
valida_rut($rut);

function valida_rut($rut)
{
    $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;

        $suma += $v * $i;
        ++$i;
    }

    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';

    if($dvr == strtoupper($dv)){
        echo "verdadero";
        exit;
        return true;
    }
    else{
        echo "falso";
        return false;
        exit;
    }
}