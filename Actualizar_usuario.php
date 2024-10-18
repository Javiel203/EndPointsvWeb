<?php
/**
 * Actualiza un usuario de la base de datos
 */

require 'Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents("php://input"),true);
    $id = $data['id'];
    $userName = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    
    $result = Usuarios::update($id, $userName, $email, $password);

    if ($result) {
        echo json_encode(["estado" => 1, "mensaje" => "exito"]);
    } else {
        echo json_encode(["estado" => 2, "mensaje" => "error"]);
    }
}