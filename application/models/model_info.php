<?php

require_once 'application/models/db_connection.php';

class Model_Info extends Model
{
    /**
     * @return array|bool|void
     */
    public function get_data()
    {
        $db = new db_connection();
        session_start();
        $email = $_SESSION['email'];
        if(!empty($email)){
            $sql = "SELECT * FROM `base` WHERE `email` = :option";
            $result = $db->connect()->prepare($sql);
            $result->execute(array(':option' => $email));
            return $result->fetchAll();
        }
        return true;
    }

}