<?php
    $servidor="localhost";
    $usuario="root";
    $contrasenia="";
    $bd="aduana";
    $aduana=new mysqli($servidor,$usuario,$contrasenia,$bd);
    if($aduana->connect_error){
        die("Error de conexión: " . $aduana->connect_error);
    }