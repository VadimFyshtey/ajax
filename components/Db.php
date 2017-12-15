<?php

class Db {
    private static $_connection;


    private function __construct() {}
    private function __clone() { }

    public static function getConnection() {
        if(!self::$_connection) {
            $paramsPath = ROOT . '/config/db_params.php';
            $params = include($paramsPath);
            if (!self::$_connection) {
                self::$_connection = new mysqli($params['host'], $params['user'],
                    $params['password'], $params['dbname']);
                mysqli_set_charset(self::$_connection, "utf8");
            }

            if (mysqli_connect_error()) {
                trigger_error("Failed to connect to MySQL: " . mysqli_connect_error(),
                    E_USER_ERROR);
            }
        }
        return self::$_connection;
    }
}