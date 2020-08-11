<?php

require_once 'application/models/db_connection.php';

class Model_Main extends Model
{
    /**
     * @return array|void
     */
    public function get_data()
    {
        $db = new db_connection();
        $sql = "SELECT * FROM `t_koatuu_tree` WHERE `ter_type_id` = 0";
        $result = $db->connect()->query($sql);
        return $result->fetchAll();
    }
}