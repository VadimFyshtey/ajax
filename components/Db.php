<?php

class Db{
    
    public static function getConnection(){
        
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        $charset = 'utf8';
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']};charset=$charset";
        $db = new PDO($dsn, $params['user'], $params['password']);
        
        return $db;
        
    }
    
}
