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
    case 'POST':
        if ((isset($_POST['userId'])) && $_POST['userId'] !== 0){
            $userId = $_POST['userId'];
            echo getCache($userId);
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

    if ($userId > 0){
        if (isAccessTokenValid()){
            $productionPointQuery = "SELECT f.farm_id, f.producer_id, f.farm_name, f.farm_desc, f.street, f.house_number, f.city, f.zip FROM farm_land f where f.producer_id = $userId;";
            if ($result = mysqli_query($dbConnection, $productionPointQuery)) {
                $data = $result->fetch_all(MYSQLI_ASSOC);
                $cacheData['production_point'] = $data;
            }
        }
    }

    mysqli_close($dbConnection);
    return json_encode($cacheData, JSON_UNESCAPED_SLASHES);
}

?>