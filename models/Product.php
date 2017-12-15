<?php
/**
 * Created by PhpStorm.
 * User: fyshtey
 * Date: 11.12.17
 * Time: 12:43
 */





class Product
{

    public static function getProductById($id){

        $db = DB::run();

        $productList = [];

        $sql = "SELECT * FROM product WHERE id = '$id' ";

        $result = $db->query($sql);

        $i = 0;

        while ($row = $result->fetch()){

            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['date'] = $row['date'];
            $i++;
        }


        return $productList;
    }

    public static function getProductList($val = false){

        $db = DB::run();

        $productList = [];

        $sql = "SELECT * FROM product";


        if($val){


            if($val){
                if($val == 1){
                    $sql .= ' ORDER BY price ASC';
                } elseif($val == 2){
                    $sql .= ' ORDER BY name ASC';
                } elseif ($val == 3){
                    $sql .= ' ORDER BY date DESC';
                }

            }

        }

        $result = $db->query($sql);

        $i = 0;

        while ($row = $result->fetch()){

            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['date'] = $row['date'];
            $i++;
        }


        return $productList;

    }

    public static function getProductsListByCategory($cat_id, $sort_id = false){

        if($cat_id){

            $db = DB::run();

            $products = [];

            $sql = "SELECT * FROM product WHERE category_id = '$cat_id'";

            if($sort_id){
                if($sort_id == 1){
                    $sql .= ' ORDER BY price ASC';
                } elseif($sort_id == 2){
                    $sql .= ' ORDER BY name ASC';
                } elseif ($sort_id == 3){
                    $sql .= ' ORDER BY date DESC';
                }

            }

            $result = $db->query($sql);

            $i = 0;

            while ($row = $result->fetch()){
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['date'] = $row['date'];
                $i++;
            }

            return $products;
        }

    }

}