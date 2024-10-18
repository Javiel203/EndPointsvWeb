<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents("php://input"),true);

    $email = $data['email'];
    $password = $data['password'];

    $loginResult = Usuarios::login($email, $password);

    if ($loginResult['success']) {
        echo json_encode(['estado' => 1, 'mensaje' => 'Login exitoso', 'usuario' => $loginResult['user']]);
    } else {
        echo json_encode(['estado' => 2, 'mensaje' => $loginResult['message']]);
    }
}