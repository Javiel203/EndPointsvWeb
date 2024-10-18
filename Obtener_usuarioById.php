<?php
/**
 * Actualiza un usuario de la base de datos
 */

require 'Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $usuario = Usuarios::getById($id);

     // Evaluar el resultado de la operación de consulta
     if ($usuario) {
        echo json_encode(["estado" => 1, "usuario" => $usuario]);
    } else if ($usuario == []) {
        echo json_encode(["estado" => 2, "mensaje" => "Usuario no encontrado"]);
    } else {
        echo json_encode(["estado" => 3, "mensaje" => "Error al consultar usuario"]);
    }
    
}