<?php
/**
 * Created by PhpStorm.
 * User: fyshtey
 * Date: 11.12.17
 * Time: 12:53
 */

require_once(ROOT . '/models/Category.php');
require_once(ROOT . '/models/Product.php');


class SiteController
{

    public function actionIndex(){

        $categories = Category::getCategoriesList();

        $products = Product::getProductList();
        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionCategory(){

        if($_POST['cat_id']){
            $cat_id = $_POST['cat_id'];
        }


        $categories = Category::getCategoriesList();

        $categoryProducts = Product::getProductsListByCategory($cat_id);

        require_once(ROOT . '/views/site/category.php');

        return true;

    }

    public function actionMod($cat_id){

        if($_POST['cat_id']){
            $cat_id = $_POST['cat_id'];
        }


        $categories = Category::getCategoriesList();

        $categoryProducts = Product::getProductsListByCategory($cat_id);

        require_once(ROOT . '/views/site/category.php');

        return true;

    }

    public function actionSort() {

        if($_POST['sort_id']){
            $val = $_POST['sort_id'];

        }

        $categories = Category::getCategoriesList();

        $products = Product::getProductList($val);

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionBuy()
    {
        if($_POST['prod_id']){
            $id = $_POST['prod_id'];

            $prod = Product::getProductById($id);
            $prod = json_encode($prod);


            return $prod;

        }

        return true;
    }

}