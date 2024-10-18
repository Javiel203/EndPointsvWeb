<?php

/**
 * Clase para manejar la configuración de los usuarios en la base de datos.
 */
require 'Database.php';

class UserConfig
{
    function __construct() {}

    /**
     * Actualiza la configuración de idioma preferido de un usuario.
     *
     * @param $user_id ID del usuario.
     * @param $language_code Código de idioma preferido.
     * @return bool True si la actualización fue exitosa.
     */
    public static function updatePreferredLanguage($user_id, $language_code)
    {
        $consulta = "UPDATE user_config SET preferred_language_code = ?, created_at = NOW() WHERE user_id = ?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array($language_code, $user_id));
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene la configuración de idioma de un usuario.
     *
     * @param $user_id ID del usuario.
     * @return array Configuración de usuario.
     */
    public static function getByUserId($user_id)
    {
        $consulta = "SELECT * FROM user_config WHERE user_id = ?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($user_id));
            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
