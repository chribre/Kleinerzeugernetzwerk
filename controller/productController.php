<?php 
/****************************************************************
   FILE             :   productController.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   CRUD operations on product model. 
                        add new products, edit product details, delete a product.
****************************************************************/

session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/productModel.php");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ((isset($_GET['productId'])) && $_GET['productId'] !== 0){
            $productId = $_GET['productId'];
            $producerId = $_GET['producerId'];
            echo getProduct($productId, $producerId);
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
            echo deleteProduct($product->productId, $product->producerId);
            break;
        } else{
            if ($product->productId == 0){
                //                                echo addProduct($product->producerId, $product->productName, $product->productDesc, $product->productCategory, $product->productionLocation, $product->isProcessedProduct, $product->isAvailable, $product->pricePerUnit, $product->quantityOfPrice, $product->unit, $product->productRating, $files, $product->productFeatures, $product->productFeaturesId, $product->productSellingPointIdArray, $product->productSellingPoints);
                echo insertNewProduct($product);
                break;
            }else{
                echo updateProducts($product->producerId, $product->productId,$product->productName, $product->productDesc, $product->productCategory, $product->productionLocation, $product->isProcessedProduct, $product->isAvailable, $product->pricePerUnit, $product->quantityOfPrice, $product->unit, $product->productRating, $product->productFeatures, $product->productFeaturesId, $product->productSellingPointIdArray, $product->productSellingPoints);
                break;
            }
        }

        break;
}


/*
    FUNCTION    :   to fetch all products by a user.
    INPUT       :   user id
    OUTPUT      :   return list of products with product details, production point details, images etc
                    otherwise return emply array
*/
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


function insertNewProduct($productDetails){
    global $dbConnection;
    if (isAccessTokenValid()){
        $productInsertQuery = "INSERT INTO products (producer_id, product_name, product_description, product_category, production_location, is_processed_product, is_available, price_per_unit, quantity_of_price, unit, product_rating)"
            . "VALUES ($productDetails->producerId, '$productDetails->productName', '$productDetails->productDesc', $productDetails->productCategory, $productDetails->productionLocation, $productDetails->isProcessedProduct, $productDetails->isAvailable, $productDetails->pricePerUnit, $productDetails->quantityOfPrice, $productDetails->unit, $productDetails->productRating);";

        try{
            if (mysqli_query($dbConnection, $productInsertQuery)){
                $productId = $dbConnection->insert_id;

                $productFeaturesCount = count($productDetails->productFeatures);
                $productFeatureIdCount = count($productDetails->productFeaturesId);
                $productfeatureQuery = PrepareFeatureQuery($productDetails->productFeatures, $productDetails->productFeaturesId, $productId);


                $productSellerCount = count($productDetails->productSellingPoints);
                $productSellerIdCount = count($productDetails->productSellingPointIdArray);
                $productSellerQuery = PrepareProductSellerQuery($productDetails->productSellingPointIdArray, $productDetails->productSellingPoints, $productId);


                $featureAndSellerQuery = $productfeatureQuery.$productSellerQuery;

                if ($productFeaturesCount > 0 || $productFeatureIdCount > 0 || $productSellerCount > 0 || $productSellerIdCount > 0){
                    try{
                        if (mysqli_multi_query($dbConnection, $featureAndSellerQuery)){
                            http_response_code(200);
                            return true;
                        }
                    }catch(mysqli_sql_exception $exception){
                        http_response_code(400);
                    }
                }else{
                    http_response_code(200);
                    return true;
                }
            }
        }catch(mysqli_sql_exception $exception){
            http_response_code(400);
        }
    }else{
        http_response_code(401);
        return false;
    }
    http_response_code(400);
    return false;
}



/*
    FUNCTION    :   to Add product details to product table
    INPUT       :   product details fetched from add product modal
    OUTPUT      :   return true if product details, features and images are inserted into the database successully
*/
//function addProduct($producerId, $productName, $productDescription, $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating, $fileNameArray, $productFeaturesArray, $productFeatureIdArray, $productSellerIdArray, $sellerIdArray){
//    global $dbConnection;
//    /* Start transaction */
//    //    mysqli_begin_transaction($dbConnection);
//    if (isAccessTokenValid()){
//        mysqli_begin_transaction($dbConnection);
//        $productInsertQuery = "INSERT INTO products (producer_id, product_name, product_description, product_category, production_location, is_processed_product, is_available, price_per_unit, quantity_of_price, unit, product_rating)"
//            . "VALUES ($producerId, '$productName', '$productDescription', $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating)";
//
//
//        try{
//            //            echo "trying to insert";
//            //            echo "\n ".$productInsertQuery."\n";
//            if (mysqli_query($dbConnection, $productInsertQuery))
//                echo "   inserted succesfully   ";
//            //            confirmQuery($productInsertQuery);
//            $productId = $dbConnection->insert_id;
//
//
//            $productFeaturesCount = count($productFeaturesArray);
//            $productfeatureQuery = PrepareFeatureQuery($productFeaturesArray, $productFeatureIdArray, $productId);//"INSERT INTO product_feature (product_id, feature_type) VALUES ";
//            if ($productFeaturesCount > 0){
//
//                if (mysqli_multi_query($dbConnection, $productfeatureQuery)){
//                    //                    echo "  features inserted succesfully   ";
//                    mysqli_commit($dbConnection);
//                }else{
//                    //                    echo "product creation failed at inserting images,";
//                    mysqli_rollback($dbConnection);
//                }
//            }
//
//            $fileCount = count($fileNameArray);
//            $productImageQuery = "INSERT INTO images (image_type, image_name, entity_id) VALUES ";
//            if ($fileCount > 0){
//                for ($i = 0; $i<$fileCount; $i++){
//                    $imageName = $fileNameArray[$i];
//                    $productImageQuery .= "(1, '$imageName', $productId)";
//                    if ($i===$fileCount-1){
//                        $productImageQuery .= ";";
//                    }else{
//                        $productImageQuery .= ", ";
//                    }
//                }
//                echo $productImageQuery;
//                if (mysqli_query($dbConnection, $productImageQuery)){
//                    //                    echo "  Files inserted succesfully   ";
//                    mysqli_commit($dbConnection);
//                }else{
//                    //                    echo "product creation failed at inserting images,";
//                    mysqli_rollback($dbConnection);
//                }
//            }else{
//                mysqli_commit($dbConnection);
//                //                echo "inserted";
//                //                echo "product id is $productId, ";
//            }
//
//        }catch(mysqli_sql_exception $exception){
//            echo "product creation failed,";
//            mysqli_rollback($dbConnection);
//            var_dump($exception);
//            throw $exception;
//
//        }
//
//    }
//    return true;
//}
//


/*
    FUNCTION    :   to edit product details of an existing product in the database
    INPUT       :   product details fetched from add product modal
    OUTPUT      :   return true if product details, features and images are upadated successully
*/
function updateProducts($producerId, $productId, $productName, $productDesc, $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $pricePerUnit, $quantityOfPrice, $unit, $productRating, $productFeatures, $featureIdArray, $productSellerId, $productSellers){

    ob_start();
    global $dbConnection;



    if (isAccessTokenValid()){

        $updateProductQuery = "UPDATE products ";
        $updateProductQuery .= "SET product_name = '$productName', product_description = '$productDesc', product_category = $productCategory, production_location = $productionLocation, is_processed_product = $isProcessedProduct, is_available = $isAvailable, price_per_unit = $pricePerUnit, quantity_of_price = $quantityOfPrice, unit = $unit, product_rating = $productRating ";
        $updateProductQuery .= "WHERE product_id = $productId AND producer_id = $producerId;";


        $productfeatureQuery = PrepareFeatureQuery($productFeatures, $featureIdArray, $productId);
        $updateProductQuery .= $productfeatureQuery;

        $productSellerQuery = PrepareProductSellerQuery($productSellerId, $productSellers, $productId);
        $updateProductQuery .= $productSellerQuery;


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


/*
    FUNCTION    :   to get details of a product
    INPUT       :   product details fetched from add product modal
    OUTPUT      :   return true if product details, features and images are upadated successully
*/
function getProduct($productId, $producerId){
    ob_start();
    global $dbConnection;
    if (isAccessTokenValid()){
        $getProductQuery = "SELECT * FROM products p ";
        //        $getProductQuery .= "JOIN product_feature pf on pf.product_id = p.product_id ";
        $getProductQuery .= "WHERE p.product_id = $productId AND p.producer_id = $producerId;";

        $getProductQuery .= "SELECT * FROM product_feature pf ";
        $getProductQuery .= "WHERE pf.product_id = $productId;";

        $getProductQuery .= "SELECT * FROM product_sellers ps WHERE ps.product_id = $productId;";
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
/*
    FUNCTION    :   features for each product is handled in this function.
                    by comapring the feature id and feature type it decide whether it to update, delete or insert new feature.
    INPUT       :   feature array from add product modal, existing feature ids of the product, prod
    OUTPUT      :   return true if product details, features and images are upadated successully
*/
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


/*
    FUNCTION    :   sellers for each product is handled in this function.
                    by comapring the seller id and product seller id it decide whether it to update, delete or insert new feature.
    INPUT       :   seller array from add product modal, existing seller ids of the product, product id
    OUTPUT      :   return true if product details, features and images are upadated successully
*/
function PrepareProductSellerQuery($productSellerIdArray, $sellerIdArray, $productId){
    $productSellerQuery = "";

    for ($i = 0; $i < count($sellerIdArray); $i++){
        $sellerId = $sellerIdArray[$i];
        $productSellerId = $productSellerIdArray[$i];
        if ($productSellerId == 0 && $sellerId != 0){
            $productSellerQuery .= "INSERT INTO product_sellers (product_id, seller_id) VALUES ";
            $productSellerQuery .= "($productId, $sellerId);";
        }elseif($productSellerId != 0 && $sellerId != 0){
            $productSellerQuery .= "UPDATE product_sellers  SET product_id = $productId, seller_id = $sellerId WHERE id = $productSellerId;";
        }elseif($productSellerId != 0 && $sellerId == 0){
            $productSellerQuery .= "DELETE FROM product_sellers WHERE id = $productSellerId;";
        }
    }
    return $productSellerQuery;
}


/*
    FUNCTION    :   function deletes an entry of product by a user from the database
    INPUT       :   id of the product to be deleted
    OUTPUT      :   return true if product deleted successully otherwise false
*/
function deleteProduct($productId, $producerId){
    ob_start();
    global $dbConnection;
    if (isAccessTokenValid()){
        $deleteProductQuery = "DELETE FROM products WHERE product_id = $productId AND producer_id = $producerId;";
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

/*
    FUNCTION    :   to fetch all products from a production point and show on side bar of the map
    INPUT       :   id of the production point
    OUTPUT      :   return array of products as json
*/
function fetchAllProductsFromLocation($locationId){
    ob_start();
    global $dbConnection;

    $productsQuery = "SELECT * FROM products p where p.production_location = $locationId;";
    $productData = [];
    if ($result = mysqli_query($dbConnection, $productsQuery)) {
        while ($row = $result->fetch_all(MYSQLI_ASSOC)) {
            $productData = $row;
            //            array_push ($productData, $row);
        }
    }

    mysqli_close($dbConnection);
    return json_encode($productData);



}

?>