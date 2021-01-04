<?php 
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/productModel.php");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ((isset($_GET['productId'])) && $_GET['productId'] !== 0){
            $productId = $_GET['productId'];
            echo getProduct($productId);
        }
        break;
        
    case 'POST':
        
        $product = new product($_POST);

        if ($product->isDelete == true){
            echo deleteProduct($product->productId);
        } else{
            if ($product->productId == 0){
            addProduct($product->productName, $product->productDesc, $product->productCategory, $product->productionLocation, $product->isProcessedProduct, $product->isAvailable, $product->pricePerUnit, $product->quantityOfPrice, $product->unit, $product->productRating, $files, $product->productFeatures);
        }else{
            updateProducts($product->productId,$product->productName, $product->productDesc, $product->productCategory, $product->productionLocation, $product->isProcessedProduct, $product->isAvailable, $product->pricePerUnit, $product->quantityOfPrice, $product->unit, $product->productRating);
        }
        }
        
        break;
}




//Add product details to product table
function addProduct($productName, $productDescription, $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating, $fileNameArray, $productFeaturesArray){
    global $dbConnection;
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);
    if (isTokenValid()){
        $producerId = $_SESSION["userId"];
        mysqli_begin_transaction($dbConnection);
        $productInsertQuery = "INSERT INTO products (producer_id, product_name, product_description, product_category, production_location, is_processed_product, is_available, price_per_unit, quantity_of_price, unit, product_rating)"
            . "VALUES ($producerId, '$productName', '$productDescription', $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating)";


        try{
            echo "trying to insert";
            echo "\n ".$productInsertQuery."\n";
            if (mysqli_query($dbConnection, $productInsertQuery))
                echo "   inserted succesfully   ";
            //            confirmQuery($productInsertQuery);
            $productId = $dbConnection->insert_id;


            $productFeaturesCount = count($productFeaturesArray);
            $productfeatureQuery = "INSERT INTO product_feature (product_id, feature_type) VALUES ";
            if ($productFeaturesCount > 0){
                for ($i = 0; $i<$productFeaturesCount; $i++){
                    $featureType = $productFeaturesArray[$i];
                    $productfeatureQuery .= "($productId, $featureType)";
                    if ($i===$productFeaturesCount-1){
                        $productfeatureQuery .= ";";
                    }else{
                        $productfeatureQuery .= ", ";
                    }
                }
                echo $productImageQuery;
                if (mysqli_query($dbConnection, $productfeatureQuery)){
                    echo "  Files inserted succesfully   ";
                    //                    mysqli_commit($dbConnection);
                }else{
                    echo "product creation failed at inserting images,";
                    mysqli_rollback($dbConnection);
                }
            }

            $fileCount = count($fileNameArray);
            $productImageQuery = "INSERT INTO images (image_type, image_name, entity_id) VALUES ";
            if ($fileCount > 0){
                for ($i = 0; $i<$fileCount; $i++){
                    $imageName = $fileNameArray[$i];
                    $productImageQuery .= "(1, '$imageName', $productId)";
                    if ($i===$fileCount-1){
                        $productImageQuery .= ";";
                    }else{
                        $productImageQuery .= ", ";
                    }
                }
                echo $productImageQuery;
                if (mysqli_query($dbConnection, $productImageQuery)){
                    echo "  Files inserted succesfully   ";
                    mysqli_commit($dbConnection);
                }else{
                    echo "product creation failed at inserting images,";
                    mysqli_rollback($dbConnection);
                }
            }else{
                mysqli_commit($dbConnection);
                echo "inserted";
                echo "product id is $productId, ";
            }

        }catch(mysqli_sql_exception $exception){
            echo "product creation failed,";
            mysqli_rollback($dbConnection);
            var_dump($exception);
            throw $exception;

        }

    }

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

function getProduct($productId){
    ob_start();
    global $dbConnection;
    if (isTokenValid()){
        $producerId = $_SESSION["userId"];
        $getProductQuery = "SELECT * FROM products p ";
//        $getProductQuery .= "JOIN product_feature pf on pf.product_id = p.product_id ";
        $getProductQuery .= "WHERE p.product_id = $productId AND p.producer_id = $producerId;";
        $getProductResult = mysqli_query($dbConnection, $getProductQuery);
        confirmQuery($getProductResult);
        if ($getProductResult->num_rows > 0){
            $result = mysqli_fetch_all($getProductResult, MYSQLI_ASSOC);
            ob_end_clean();
            return json_encode($result[0]);
        }else{
            echo "<script>console.log('PHP: No products found with the given product id');</script>";
        }
    }else{
        echo "<script>console.log('PHP: Authentication Failed');</script>";
    }
}


function deleteProduct($productId){
    ob_start();
    global $dbConnection;
    if (isTokenValid()){
        $producerId = $_SESSION["userId"];
        $deleteProductQuery = "DELETE FROM products ";
        $deleteProductQuery .= "WHERE product_id = $productId AND producer_id = $producerId;";
        $deleteProductResult = mysqli_query($dbConnection, $deleteProductQuery);
        confirmQuery($deleteProductResult);
        if ($deleteProductResult == true){
            ob_end_clean();
            return true;
        }else{
            echo "<script>console.log('PHP: No products found with the given product id');</script>";
        }
    }else{
        echo "<script>console.log('PHP: Authentication Failed');</script>";
    }
    return false;
}
?>