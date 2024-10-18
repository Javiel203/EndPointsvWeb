<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'Conversaciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $conversaciones = Conversaciones::getAll();

    if ($conversaciones) {

        $datos["estado"] = 1;
        $datos["Conversaciones"] = $conversaciones;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}