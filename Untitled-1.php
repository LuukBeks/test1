<?php

$autos = array("45-tkp-12"=>"Volkswagen Golf GTI",
                "TP-TR-80"=>"Volkswagen POLO",
                "00-CO-12"=>"Mercedes E300 AMG");

$namen = array("Johan","Pieter", "Henk")

var_dump($autos);

foreach($autos as $key => $value)
{
    echo "Kenteken: ".$key." Auto: ".$value."<br/>";
}

?>