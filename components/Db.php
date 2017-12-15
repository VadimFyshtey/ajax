<?php

class DB
{
    private static $_instance = null;

    public static function run()
    {

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        if (self::$_instance === null)
        {
            try
            {
                self::$_instance = new PDO($params['db_type'].':host='.$params['host'].';dbname='.$params['dbname'], $params['user'], $params['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e)
            {
                echo "Ошибка подключения к базе данных<br>";
            }
        }
        return self::$_instance;
    }
}