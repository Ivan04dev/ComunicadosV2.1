<?php
    include "conexion.php";

// Obtener los datos enviados desde JavaScript
$puestos = json_decode(file_get_contents("php://input"), true);
$marcas = json_decode(file_get_contents("php://input"), true);

// Manipular los datos como lo necesites
// En este ejemplo, solo los imprimiré
// print_r($data);

var_dump($puestos);
var_dump($marcas);
