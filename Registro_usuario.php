<?php
/**
 * Registra todas las metas de la base de datos
 */

require 'Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents("php://input"),true);

    $userName = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    
    $result = Usuarios::insert($userName, $email, $password);

    if ($result) {
        echo json_encode(["estado" => 1, "mensaje" => "Inserción exitosa"]);
    } else {
        echo json_encode(["estado" => 2, "mensaje" => "Ha ocurrido un error"]);
    }
}