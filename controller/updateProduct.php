<?php 
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/productModel.php");

switch ($_SERVER['REQUEST_METHOD']) {
        
        
//        $productId = isset($_POST['productId']) ? escapeSQLString($_POST['productId']) : 0;
//        $productName = isset($_POST['productName']) ? escapeSQLString($_POST['productName']) : "";
//        $productDesc = isset($_POST['productDesc']) ? escapeSQLString($_POST['productDesc']) : "";
//        $productCategory = isset($_POST['productCategory']) ? escapeSQLString($_POST['productCategory']) : 0;
//        $productFeatures = isset($_POST['productFeatures']) ? escapeSQLString($_POST['productFeatures']) : null;
//        $productionPoint = isset($_POST['productionPoint']) ? escapeSQLString($_POST['productionPoint']): 0;
//        $productPrice = isset($_POST['productPrice']) ? floatval(escapeSQLString($_POST['productPrice'])) : 0;
//        $productQuantity = isset($_POST['quantity']) ? floatval(escapeSQLString($_POST['quantity'])) : 0;
//        $productUnit = isset($_POST['unit']) ? escapeSQLString($_POST['unit']): 0;
//        $isProcessedFood = (isset($_POST['isProcessed']) && $_POST['isProcessed'] === true) ? 1 : 0;
//        $isAvailable = true;
//        $productRating = 0;
    case 'GET':

        echo "<script>console.log('PHP: GET request found');</script>";
        break;
    case 'POST':
        $product = new product($_POST);
//        echo "<script>console.log('PHP: post method varaibles $product');</script>";
        echo "<script>console.log('PHP: POST request found');</script>";
        
        
        updateProducts($product->productId,$product->productName, $product->productDesc, $product->productCategory, $product->productionLocation, $product->isProcessedProduct, $product->isAvailable, $product->pricePerUnit, $product->quantityOfPrice, $product->unit, $product->productRating);
        
        
//        updateProducts($productId, $productName, $productDesc, $productCategory, $productionPoint, $isProcessedFood, $isAvailable, $productPrice, $productQuantity, $productUnit, $productRating);
        break;
    case 'UPDATE':
        echo "<script>console.log('PHP: UPDATE request found');</script>";
            break;
    case 'DELETE':
        echo "<script>console.log('PHP: DELETE request found');</script>";
        break;
}



function updateProducts($productId, $productName, $productDesc, $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $pricePerUnit, $quantityOfPrice, $unit, $productRating){

    ob_start();
    global $dbConnection;



    if (isTokenValid()){

        $producerId = $_SESSION["userId"];

        $updateProductQuery = "UPDATE products ";
        $updateProductQuery .= "SET product_name = '$productName', product_description = '$productDesc', product_category = $productCategory, production_location = $productionLocation, is_processed_product = $isProcessedProduct, is_available = $isAvailable, price_per_unit = $pricePerUnit, quantity_of_price = $quantityOfPrice, unit = $unit, product_rating = $productRating ";
        $updateProductQuery .= "WHERE product_id = $productId AND producer_id = $producerId;";
        
        mysqli_begin_transaction($dbConnection);
 
        try{
            echo "<script>console.log('PHP: " . $updateProductQuery . "');</script>";
            if (mysqli_query($dbConnection, $updateProductQuery)){
                mysqli_commit($dbConnection);
                echo "<script>console.log('PHP: Successfully updated prodcut details');</script>";
            }else{
                echo "<script>console.log('PHP: faield to update prodcut details');</script>";
                mysqli_rollback($dbConnection);
            }
        }catch(mysqli_sql_exception $exception){
            echo "<script>console.log('PHP: faield to update prodcut details exception');</script>";
            mysqli_rollback($dbConnection);
            var_dump($exception);
            throw $exception;

        }
    }else{
        echo "<script>console.log('PHP: Authentication Failed');</script>";
    }
}

?>