<?php

require_once 'application/models/db_connection.php';

class Model_Ajax
{
    /**
     * @param $option
     * @return array
     */
    public function get_data($option)
    {
        $db = new db_connection();
        $sql = "SELECT * FROM `t_koatuu_tree` WHERE `ter_pid` = :option";
        $result = $db->connect()->prepare($sql);
        $result->execute(array(':option' => $option));
        return $result->fetchAll();
    }

    /**
     * @return bool
     */
    public function create_table(){
        $db = new db_connection();
        $sql ="CREATE TABLE IF NOT EXISTS `base`(
        id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR( 100 ) NOT NULL,
        email VARCHAR( 100 ) NOT NULL, 
        registration VARCHAR( 200 ) NOT NULL);" ;
        $db->connect()->exec($sql);
        return true;
    }

    /**
     * @param $name
     * @param $email
     * @param $registration
     * @return bool
     */
    public function insert_data($name, $email, $registration){
        $sql = "INSERT INTO base (name, email, registration) VALUES (?,?,?)";
        $db = new db_connection();
        $result = $db->connect()->prepare($sql);
        $result->execute([$name, $email, $registration]);
        return true;
    }

    /**
     * @param $name
     * @param $email
     * @param $registration
     * @return bool
     */
    public function save_data($name, $email, $registration){
        $this->create_table();
        $this->insert_data($name, $email, $registration);
        return true;
    }

    /**
     * @param $email
     * @return int
     */
    public function checkEmail($email){
        $db = new db_connection();
        $query = $db->connect()->prepare( "SELECT `email` FROM `base` WHERE `email` = ?" );
        $query->bindValue( 1, $email );
        $query->execute();
        return $query->rowCount();
    }

}