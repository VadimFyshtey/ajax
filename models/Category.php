<?php
/**
 * Created by PhpStorm.
 * User: fyshtey
 * Date: 11.12.17
 * Time: 13:12
 */

class Category
{

    public static function getCategoriesList(){

        $db = DB::run();

        $categoryList = [];

        $result = $db->query('SELECT * FROM category');

        $i = 0;

        while ($row = $result->fetch()){

            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }


        return $categoryList;
    }

}