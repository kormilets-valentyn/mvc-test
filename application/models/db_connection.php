<?php

class db_connection {
    /**
     * db_connection constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return PDO
     */
    public function connect(){
        $params = [
            'host' => 'localhost',
            'dbname' => 'protest14',
            'user' => 'valik',
            'password' => 'valik',
        ];
        $dsn = 'mysql:host='.$params['host'] . ';dbname=' . $params['dbname'];
        return new PDO($dsn, $params['user'], $params['password']);
    }

}