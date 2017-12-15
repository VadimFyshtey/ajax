<?php
class Db {
    private $_connection;
    private static $_instance;


    public static function getInstance() {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    // Constructor
    private function __construct() {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        $this->_connection = new mysqli($params['host'], $params['user'],
            $params['password'], $params['dbname']);
        $this->_connection->set_charset("utf8");
        // Error handling
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }
    }

    private function __clone() { }

    public function getConnection() {
        return $this->_connection;
    }
}