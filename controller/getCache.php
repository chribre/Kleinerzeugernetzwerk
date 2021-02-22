<?php 

/****************************************************************
   FILE             :   getCache.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   CRUD operations on product model. 
                        add new products, edit product details, delete a product.
****************************************************************/


session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");
//include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/productCategoryModel.php");



switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ((isset($_GET['userId'])) && $_GET['userId'] !== 0){
            $userId = $_GET['userId'];
            echo getCache(0);
            break;
        }
}

/*
    FUNCTION    :   to fetch product categories, feature types, units from the database.
    INPUT       :   user id
    OUTPUT      :   return a json dictionary with product categories, feature types, units
*/
function getCache($userId){
    $cacheData = [];
    global $dbConnection;
    $productCategoryQuery = "SELECT * FROM product_category;";
    $productFeatureQuery = "SELECT * FROM feature_type;";
    $productUnits = "SELECT * FROM units;";
    
    if ($result = mysqli_query($dbConnection, $productCategoryQuery)) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $cacheData['product_category'] = $data;
    }
    
    if ($result = mysqli_query($dbConnection, $productFeatureQuery)) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $cacheData['product_feature'] = $data;
    }

    if ($result = mysqli_query($dbConnection, $productUnits)) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $cacheData['product_unit'] = $data;
    }
    
    mysqli_close($dbConnection);
    return json_encode($cacheData);
}

?>