<?php

/**
 * Clase para manejar los mensajes en la base de datos.
 */
require 'Database.php';

class Mensaje
{
    function __construct() {}

    /**
     * Inserta un nuevo mensaje en una conversación.
     *
     * @param $conversation_id ID de la conversación.
     * @param $user_id ID del usuario que envía el mensaje.
     * @param $message_text Texto del mensaje.
     * @param $language_code Código de idioma del mensaje.
     * @return bool True si el mensaje fue insertado con éxito.
     */
    public static function insert($conversation_id, $user_id, $message_text, $language_code)
    {
        $consulta = "INSERT INTO mensajes (conversation_id, user_id, message_text, language_code, created_at) 
                     VALUES (?, ?, ?, ?, NOW())";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            return $comando->execute(array($conversation_id, $user_id, $message_text, $language_code));
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene todos los mensajes de una conversación.
     *
     * @param $conversation_id ID de la conversación.
     * @return array Mensajes de la conversación.
     */
    public static function getByConversation($conversation_id)
    {
        $consulta = "SELECT * FROM mensajes WHERE conversation_id = ?";
        try {
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($conversation_id));
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
