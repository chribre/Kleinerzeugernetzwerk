<?php 
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/productModel.php");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ((isset($_GET['productId'])) && $_GET['productId'] !== 0){
            $productId = $_GET['productId'];
            echo getProduct($productId);
            break;
        }

        if ((isset($_GET['userId'])) && $_GET['userId'] !== 0){
            $userId = $_GET['userId'];
            echo fetchAllProducts($userId);
            break;
        }

        if ((isset($_GET['productionLocationId'])) && $_GET['productionLocationId'] !== 0){
            $productionLocation = $_GET['productionLocationId'];
            echo fetchAllProductsFromLocation($productionLocation);
            break;
        }
        break;

    case 'POST':
        if (isset($_POST['userId']) && isset($_POST['fetchAllProducts'])){
            $userId = $_POST['userId'];
            echo fetchAllProducts($userId);
            break;
        }

        $product = new product($_POST);

        if ($product->isDelete == true){
            echo deleteProduct($product->productId);
            break;
        } else{
            if ($product->productId == 0){
                addProduct($product->productName, $product->productDesc, $product->productCategory, $product->productionLocation, $product->isProcessedProduct, $product->isAvailable, $product->pricePerUnit, $product->quantityOfPrice, $product->unit, $product->productRating, $files, $product->productFeatures, $product->productFeaturesId);
                break;
            }else{
                updateProducts($product->productId,$product->productName, $product->productDesc, $product->productCategory, $product->productionLocation, $product->isProcessedProduct, $product->isAvailable, $product->pricePerUnit, $product->quantityOfPrice, $product->unit, $product->productRating, $product->productFeatures, $product->productFeaturesId);
                break;
            }
        }

        break;
}



function fetchAllProducts($userId){
    $products = [];
    global $dbConnection;
    $fetchProductQuery = "SELECT * FROM products p
        LEFT JOIN images i on (i.entity_id = p.product_id and i.image_type = 1)
        WHERE p.producer_id = '$userId'
        GROUP BY p.product_id ORDER BY p.created_date DESC;";


    //    $fetchProductFeaturesQuery = "SELECT * FROM product_feature p WHERE p.product_id in (SELECT product_id FROM products pd where pd.producer_id = $userId);";
    //
    //    $fetchProductQuery .= $fetchProductFeaturesQuery;




    $productData = [];


    if ($result = mysqli_query($dbConnection, $fetchProductQuery)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tempProductData = $row;
            $productId = $row['product_id'];
            $fetchProductFeaturesQuery = "SELECT * FROM product_feature p WHERE p.product_id = $productId;";
            $featureResult = mysqli_query($dbConnection, $fetchProductFeaturesQuery) or die(mysql_error());
            $featureArray = [];
            while($featureRow = mysqli_fetch_assoc($featureResult)){
                array_push($featureArray, $featureRow);
            }
            $tempProductData['product_feature'] = $featureArray;
            array_push($productData,$tempProductData);
        }

    }

    mysqli_close($dbConnection);
    return json_encode($productData);
}




//Add product details to product table
function addProduct($productName, $productDescription, $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating, $fileNameArray, $productFeaturesArray, $productFeatureIdArray){
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
            $productfeatureQuery = PrepareFeatureQuery($productFeaturesArray, $productFeatureIdArray, $productId);//"INSERT INTO product_feature (product_id, feature_type) VALUES ";
            if ($productFeaturesCount > 0){
                //                for ($i = 0; $i<$productFeaturesCount; $i++){
                //                    $featureType = $productFeaturesArray[$i];
                //                    $productfeatureQuery .= "($productId, $featureType)";
                //                    if ($i===$productFeaturesCount-1){
                //                        $productfeatureQuery .= ";";
                //                    }else{
                //                        $productfeatureQuery .= ", ";
                //                    }
                //                }
                //                echo $productfeatureQuery;
                if (mysqli_multi_query($dbConnection, $productfeatureQuery)){
                    echo "  features inserted succesfully   ";
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




function updateProducts($productId, $productName, $productDesc, $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $pricePerUnit, $quantityOfPrice, $unit, $productRating, $productFeatures, $featureIdArray){

    ob_start();
    global $dbConnection;



    if (isTokenValid()){

        $producerId = $_SESSION["userId"];

        $updateProductQuery = "UPDATE products ";
        $updateProductQuery .= "SET product_name = '$productName', product_description = '$productDesc', product_category = $productCategory, production_location = $productionLocation, is_processed_product = $isProcessedProduct, is_available = $isAvailable, price_per_unit = $pricePerUnit, quantity_of_price = $quantityOfPrice, unit = $unit, product_rating = $productRating ";
        $updateProductQuery .= "WHERE product_id = $productId AND producer_id = $producerId;";


        $productfeatureQuery = PrepareFeatureQuery($productFeatures, $featureIdArray, $productId);

        $updateProductQuery .= $productfeatureQuery;


        //        mysqli_begin_transaction($dbConnection);

        try{
            //            echo "<script>console.log('PHP: " . $updateProductQuery . "');</script>";
            if (mysqli_multi_query($dbConnection, $updateProductQuery)){
                //                mysqli_commit($dbConnection);
                echo "<script>console.log('PHP: Successfully updated prodcut details');</script>";
            }else{
                echo "<script>console.log('PHP: faield to update prodcut details');</script>";
                //                mysqli_rollback($dbConnection);
            }
        }catch(mysqli_sql_exception $exception){
            echo "<script>console.log('PHP: faield to update prodcut details exception');</script>";
            //            mysqli_rollback($dbConnection);
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

        $getProductQuery .= "SELECT * FROM product_feature pf ";
        $getProductQuery .= "WHERE pf.product_id = $productId;";
        $productData = [];
        if (mysqli_multi_query($dbConnection, $getProductQuery)) {
            do {
                // Store first result set
                if ($result = mysqli_store_result($dbConnection)) {
                    while ($row = $result->fetch_all(MYSQLI_ASSOC)) {
                        array_push ($productData, $row);
                    }
                    //                    mysqli_free_result($result);
                }

            } while(mysqli_more_results($dbConnection) && mysqli_next_result($dbConnection));

        }

        mysqli_close($dbConnection);
        return json_encode($productData);

    }else{
        echo "<script>console.log('PHP: Authentication Failed');</script>";
    }
}

function PrepareFeatureQuery($featureArray, $featureIdArray, $productId){
    $featureQuery = "";

    for ($i = 0; $i < count($featureIdArray); $i++){
        $featureType = $featureArray[$i];
        $featureId = $featureIdArray[$i];
        if ($featureId == 0 && $featureType != 0){
            $featureQuery .= "INSERT INTO product_feature (product_id, feature_type) VALUES ";
            $featureQuery .= "($productId, $featureType);";
        }elseif($featureId != 0 && $featureType != 0){
            $featureQuery .= "UPDATE product_feature  SET product_id = $productId, feature_type = $featureType WHERE id = $featureId;";
        }elseif($featureId != 0 && $featureType == 0){
            $featureQuery .= "DELETE FROM product_feature WHERE id = $featureId;";
        }
    }
    return $featureQuery;
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


function fetchAllProductsFromLocation($locationId){
    ob_start();
    global $dbConnection;

    $productsQuery = "SELECT * FROM products p where p.production_location = $locationId;";
    $productData = [];
    if ($result = mysqli_query($dbConnection, $productsQuery)) {
        while ($row = $result->fetch_all(MYSQLI_ASSOC)) {
            array_push ($productData, $row);
        }
    }

    mysqli_close($dbConnection);
    return json_encode($productData);



}

?>