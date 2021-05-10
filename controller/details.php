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


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $header = apache_request_headers();
        $action = $header['action'];
        switch ($action){
            case 'PRODUCT':
                echo getProductDetails();
                break;
            case 'PRODUCTION_POINT':
                echo getProductionPointDetails();
                break;
            case 'SELLER':
                echo getSellerInDetail();
                break;
            case 'MAP_DATA':
                echo getProductionPointAndSellerDataToMap();
                break;

            case 'PRODUCER':
                echo fetchUserData();
                break;

            default:
                http_response_code(400);
                break;
        }
        break;
    default:
        http_response_code(400);
        break;
}

function getProductDetails(){
    global $dbConnection;
    $productId = $_POST['productId'] ? $_POST['productId'] : 0;
    if ($productId != 0){
        $productData = [];
        $productDetails = fetchProductInDetail($productId);
        $productionPointId = $productDetails['production_location'] ? $productDetails['production_location'] : 0;
        $productImages = fetchImages(2, $productId);
        $productFeatures = fetchProductFeatures($productId);
        $productionPointDetails = fetchProductionPointDetails($productionPointId);
        $selelrDetails = fetchSellerDetailsFromProduct($productId);

        $userId = $productDetails['producer_id'] ? $productDetails['producer_id'] : 0;
        $userData = getUserData($userId);


        $productData['productDetails'] = $productDetails;
        $productData['productImages'] = $productImages;
        $productData['productFeatures'] = $productFeatures;
        $productData['productionPointDetails'] = $productionPointDetails;
        $productData['sellerDetails'] = $selelrDetails;
        $productData['userData'] = $userData;

        mysqli_close($dbConnection);
        http_response_code(200);
        return json_encode($productData); //production point location longitude and latitude fetch in formatted way

    }
    http_response_code(400);
    return null;
}


function getProductionPointDetails(){
    global $dbConnection;
    $productionPointId = $_POST['productionPointId'] ? $_POST['productionPointId'] : 0;
    if ($productionPointId != 0){
        $productionPointData = [];

        $productionPointDetails = fetchProductionPointDetails($productionPointId); //details of the production point
        $userId = $productionPointDetails['producer_id'] ? $productionPointDetails['producer_id'] : 0;
        $userData = getUserData($userId);
        $productionPointImages = fetchImages(3, $productionPointId); //images of the production point

        $productDetails = fetchAllProductsFromProductionPoint($productionPointId);// all product details in the production point
        $relatedSellingPoints = fetchAllSellingPointsFromProductionPoint($productionPointId); //all selling points where these products are sold

        $productData['productionPointDetails'] = $productionPointDetails;
        $productData['productionPointImages'] = $productionPointImages;
        $productData['productDetails'] = $productDetails;
        $productData['sellerDetails'] = $relatedSellingPoints;
        $productData['userData'] = $userData;

        mysqli_close($dbConnection);
        http_response_code(200);
        return json_encode($productData); //production point location longitude and latitude fetch in formatted way

    }
    http_response_code(400);
    return null;
}


function getSellerInDetail(){
    global $dbConnection;
    $sellerId = $_POST['sellerId'] ? $_POST['sellerId'] : 0;
    if ($sellerId != 0){
        $sellerData = [];

        $sellerDetails = fetchSellerDetailFromSellerId($sellerId); //details of the production point
        $sellerImages = fetchImages(4, $sellerId); //images of the production point

        $productDetails = fetchAllProductsFromSellingPoints($sellerId);// all product details in the production point
        $relatedproductionPoints = fetchAllProductionPointsRelatedToSeller($sellerId); //all selling points where these products are sold

        $productData['sellerDetails'] = $sellerDetails;
        $productData['sellerImages'] = $sellerImages;
        $productData['productDetails'] = $productDetails;
        $productData['productionPoints'] = $relatedproductionPoints;

        mysqli_close($dbConnection);
        http_response_code(200);
        return json_encode($productData); //production point location longitude and latitude fetch in formatted way

    }
    http_response_code(400);
    return null;
}
/*
    FUNCTION    :   to fetch all product details related to a product to show in details page
    INPUT       :   id of the product and producer
    OUTPUT      :   return array of product details as json which include 
                    product details, images, production point details and selelr details
*/
function fetchProductInDetail($productId){
    ob_start();
    global $dbConnection;

    $productsQuery = "SELECT p.*, pc.category_name, u.unit_abbr as unit_name,
                            img.image_type, 
                            img.image_name, 
                            img.image_path, 
                            img.entity_id, 
                            GROUP_CONCAT(DISTINCT pf.feature_type) as product_features,
                            GROUP_CONCAT(DISTINCT ps.seller_id) as sellers
                    FROM products p
                    LEFT JOIN product_feature pf ON (pf.product_id = p.product_id)
                    LEFT JOIN images img ON (img.entity_id = p.product_id and img.image_type = 2) 
                    LEFT JOIN product_category pc ON pc.category_id = p.product_category
                    LEFT JOIN product_sellers ps on ps.product_id = p.product_id
                    LEFT JOIN units u ON u.unit_id = p.unit
                    WHERE p.product_id = $productId;";
    $productData = [];
    if ($result = mysqli_query($dbConnection, $productsQuery)) {
        while ($row = $result->fetch_assoc()) {
            $productData = $row;
        }
    }
    return $productData;
}

function fetchAllProductsFromProductionPoint($productionPointId){
    ob_start();
    global $dbConnection;

    $productsQuery = "SELECT i.image_path, 
                            p.*, pc.category_name, u.unit_abbr as unit_name, 
                            GROUP_CONCAT(DISTINCT p_fea.feature_type) as features,
                            GROUP_CONCAT(DISTINCT ps.seller_id) as sellers
                    FROM products p
                    LEFT JOIN product_feature p_fea on p_fea.product_id = p.product_id
                    LEFT JOIN images i ON i.entity_id = p.product_id and i.image_type = 2
                    LEFT JOIN product_sellers ps on ps.product_id = p.product_id
                    LEFT JOIN product_category pc ON pc.category_id = p.product_category
                    LEFT JOIN units u ON u.unit_id = p.unit
                    WHERE p.production_location = $productionPointId
                    GROUP BY p.product_id;";

    $productData = [];
    if ($result = mysqli_query($dbConnection, $productsQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productData = $row;
        }
    }
    return $productData;
}

function fetchAllSellingPointsFromProductionPoint($productionPointId){
    ob_start();
    global $dbConnection;

    $productsQuery = "SELECT s.seller_id, 
                            s.producer_id, 
                            s.seller_name, 
                            s.seller_description, 
                            s.street, 
                            s.building_number, 
                            s.city, s.zip, 
                            ST_X(s.seller_location) as latitude, 
                            ST_Y(s.seller_location) as longitude, 
                            s.seller_email, 
                            s.seller_website, 
                            s.mobile, 
                            s.phone, 
                            s.is_blocked, 
                            s.is_mon_available, s.mon_open_time, s.mon_close_time, 
                            s.is_tue_available, s.tue_open_time, s.tue_close_time, 
                            s.is_wed_available, s.wed_open_time, s.wed_close_time, 
                            s.is_thu_available, s.thu_open_time, s.thu_close_time, 
                            s.is_fri_available, s.fri_open_time, s.fri_close_time, 
                            s.is_sat_available, s.sat_open_time, s.sat_close_time, 
                            s.is_sun_available, s.sun_open_time, s.sun_close_time, 

                            i.image_id, 
                            i.image_type, 
                            i.image_name, 
                            i.image_path, 
                            i.entity_id from sellers s
                        LEFT JOIN product_sellers ps on ps.seller_id = s.seller_id
                        LEFT JOIN images i ON i.entity_id = s.seller_id and i.image_type = 4
                        WHERE ps.product_id in (SELECT p.product_id from products p where p.production_location = $productionPointId)
                        GROUP BY s.seller_id;";

    $productData = [];
    if ($result = mysqli_query($dbConnection, $productsQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productData = $row;
        }
    }
    return $productData;
}


function fetchAllProductsFromSellingPoints($sellingPoint){
    ob_start();
    global $dbConnection;

    $productsQuery = "SELECT i.image_path, 
                                p.*, pc.category_name, u.unit_abbr as unit_name, 
                                GROUP_CONCAT(DISTINCT p_fea.feature_type) as features,
                                f.farm_id, f.farm_name, fi.image_path as farm_image FROM products p
                        LEFT JOIN product_feature p_fea on p_fea.product_id = p.product_id
                        LEFT JOIN images i ON i.entity_id = p.product_id and i.image_type = 2
                        LEFT JOIN product_sellers ps ON ps.product_id = p.product_id
                        LEFT JOIN product_category pc ON pc.category_id = p.product_category
                        LEFT JOIN units u ON u.unit_id = p.unit
                        LEFT JOIN farm_land f ON f.farm_id = p.production_location
                        LEFT JOIN images fi ON fi.entity_id = p.production_location and fi.image_type = 3
                        WHERE ps.seller_id = $sellingPoint
                        GROUP BY p.product_id;";
    $productData = [];
    if ($result = mysqli_query($dbConnection, $productsQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productData = $row;
        }
    }
    return $productData;
}


function fetchAllProductionPointsRelatedToSeller($sellerId){
    ob_start();
    global $dbConnection;

    $productsQuery = "SELECT f.farm_id, 
                            f.producer_id, 
                            f.farm_name, 
                            f.farm_desc, 
                            f.farm_address, 
                            f.street, 
                            f.house_number, 
                            f.city, 
                            f.zip, 
                            ST_X(f.farm_location) as latitude, 
                            ST_Y(f.farm_location) as longitude, 
                            f.farm_area, 
                            u.user_id,
                            u.first_name,
                            u.last_name,
                            u.phone, u.email, u_img.image_path as user_image_path,
                                    img.image_id, 
                                    img.image_type, 
                                    img.image_name, 
                                    img.image_path, 
                                    img.entity_id FROM farm_land f
                        LEFT JOIN images img ON img.entity_id = f.farm_id and img.image_type = 3
                        lEFT JOIN user u ON u.user_id = f.producer_id
                        LEFT JOIN images u_img ON u_img.entity_id = u.user_id and u_img.image_type = 1
                        WHERE f.farm_id in (SELECT DISTINCT p.production_location from products p JOIN product_sellers ps ON                ps.product_id = p.product_id WHERE ps.seller_id = $sellerId)
                        GROUP BY f.farm_id;";
    $productData = [];
    if ($result = mysqli_query($dbConnection, $productsQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productData = $row;
        }
    }
    return $productData;
} 

function fetchImages($entityType, $entityId){
    ob_start();
    global $dbConnection;

    $fetchImageQuery = "SELECT * FROM images i WHERE i.image_type = $entityType AND i.entity_id = $entityId;";
    $imageData = [];
    if ($result = mysqli_query($dbConnection, $fetchImageQuery)) {
        while ($row = $result->fetch_all(MYSQLI_ASSOC)) {
            $imageData = $row;
        }
    }
    return $imageData;
}

function fetchProductFeatures($productId){
    ob_start();
    global $dbConnection;

    $featureQuery = "SELECT * FROM product_feature pf WHERE pf.product_id = $productId;";
    $featureData = [];
    if ($result = mysqli_query($dbConnection, $featureQuery)) {
        while ($row = $result->fetch_all(MYSQLI_ASSOC)) {
            $featureData = $row;
        }
    }
    return $featureData;
}
function fetchProductionPointDetails($productionPointId){
    ob_start();
    global $dbConnection;

    $productionPointQuery = "SELECT f.farm_id, 
                                    f.producer_id, 
                                    f.farm_name, 
                                    f.farm_desc, 
                                    f.farm_address, 
                                    f.street, 
                                    f.house_number, 
                                    f.city, 
                                    f.zip, 
                                    ST_X(f.farm_location) as latitude, 
                                    ST_Y(f.farm_location) as longitude, 
                                    f.farm_area, 
                                    img.image_id, 
                                    img.image_type, 
                                    img.image_name, 
                                    img.image_path, 
                                    img.entity_id 

                            FROM farm_land f 
                            LEFT JOIN images img on img.entity_id = f.farm_id and img.image_type = 3
                            WHERE f.farm_id = $productionPointId
                            GROUP BY f.farm_id;";
    $productionPointData = [];
    if ($result = mysqli_query($dbConnection, $productionPointQuery)) {
        while ($row = $result->fetch_assoc()) {
            $productionPointData = $row;
        }
    }
    return $productionPointData;
}
function fetchSellerDetailsFromProduct($productId){
    ob_start();
    global $dbConnection;

    $sellerQuery = "SELECT s.seller_id, 
                            s.producer_id, 
                            s.seller_name, 
                            s.seller_description, 
                            s.street, 
                            s.building_number, 
                            s.city, s.zip, 
                            ST_X(s.seller_location) as latitude, 
                            ST_Y(s.seller_location) as longitude, 
                            s.seller_email, 
                            s.seller_website, 
                            s.mobile, 
                            s.phone, 
                            s.is_blocked, 
                            s.is_mon_available, s.mon_open_time, s.mon_close_time, 
                            s.is_tue_available, s.tue_open_time, s.tue_close_time, 
                            s.is_wed_available, s.wed_open_time, s.wed_close_time, 
                            s.is_thu_available, s.thu_open_time, s.thu_close_time, 
                            s.is_fri_available, s.fri_open_time, s.fri_close_time, 
                            s.is_sat_available, s.sat_open_time, s.sat_close_time, 
                            s.is_sun_available, s.sun_open_time, s.sun_close_time, 

                            img.image_id, 
                            img.image_type, 
                            img.image_name, 
                            img.image_path, 
                            img.entity_id FROM sellers s 
                    JOIN product_sellers ps on (ps.seller_id = s.seller_id) 
                    LEFT JOIN images img on img.entity_id = s.seller_id and img.image_type = 4
                    WHERE ps.product_id = $productId
                    GROUP BY s.seller_id;";
    $sellerData = [];
    if ($result = mysqli_query($dbConnection, $sellerQuery)) {
        while ($row = $result->fetch_all(MYSQLI_ASSOC)) {
            $sellerData = $row;
        }
    }
    return $sellerData;
}


function fetchSellerDetailFromSellerId($sellerId){
    ob_start();
    global $dbConnection;

    $sellerQuery = "SELECT s.seller_id, 
                            s.producer_id, 
                            s.seller_name, 
                            s.seller_description, 
                            s.street, 
                            s.building_number, 
                            s.city, s.zip, 
                            ST_X(s.seller_location) as latitude, 
                            ST_Y(s.seller_location) as longitude, 
                            s.seller_email, 
                            s.seller_website, 
                            s.mobile, 
                            s.phone, 
                            s.is_blocked, 
                            s.is_mon_available, s.mon_open_time, s.mon_close_time, 
                            s.is_tue_available, s.tue_open_time, s.tue_close_time, 
                            s.is_wed_available, s.wed_open_time, s.wed_close_time, 
                            s.is_thu_available, s.thu_open_time, s.thu_close_time, 
                            s.is_fri_available, s.fri_open_time, s.fri_close_time, 
                            s.is_sat_available, s.sat_open_time, s.sat_close_time, 
                            s.is_sun_available, s.sun_open_time, s.sun_close_time, 

                            img.image_id, 
                            img.image_type, 
                            img.image_name, 
                            img.image_path, 
                            img.entity_id FROM sellers s 
                    LEFT JOIN images img on img.entity_id = s.seller_id and img.image_type = 4
                    WHERE s.seller_id = $sellerId
                    GROUP BY s.seller_id;";
    $sellerData = [];
    if ($result = mysqli_query($dbConnection, $sellerQuery)) {
        while ($row = $result->fetch_assoc()) {
            $sellerData = $row;
        }
    }
    return $sellerData;
}


function getProductionPointAndSellerDataToMap(){

    $data = [];
    $productionPointData = getAllProductionPoints();
    $sellerData = getAllSellingPoints();

    $data['productionPoints'] = $productionPointData;
    $data['sellers'] = $sellerData;

    http_response_code(200);
    return json_encode($data);
}

function getAllSellingPoints(){
    ob_start();
    global $dbConnection;

    $sellerQuery = "SELECT s.seller_id, 
                            s.producer_id, 
                            s.seller_name, 
                            s.seller_description, 
                            s.street, 
                            s.building_number, 
                            s.city, s.zip, 
                            ST_X(s.seller_location) as latitude, 
                            ST_Y(s.seller_location) as longitude, 
                            s.seller_email, 
                            s.seller_website, 
                            s.mobile, 
                            s.phone, 
                            s.is_blocked, 
                            s.is_mon_available, s.mon_open_time, s.mon_close_time, 
                            s.is_tue_available, s.tue_open_time, s.tue_close_time, 
                            s.is_wed_available, s.wed_open_time, s.wed_close_time, 
                            s.is_thu_available, s.thu_open_time, s.thu_close_time, 
                            s.is_fri_available, s.fri_open_time, s.fri_close_time, 
                            s.is_sat_available, s.sat_open_time, s.sat_close_time, 
                            s.is_sun_available, s.sun_open_time, s.sun_close_time, 

                            i.image_path, 
                            GROUP_CONCAT(distinct p.production_location) as production_points from sellers s
                        LEFT JOIN images i on i.entity_id = s.seller_id and i.image_type = 4
                        LEFT JOIN product_sellers ps on ps.seller_id = s.seller_id
                        LEFT JOIN products p on ps.product_id = p.product_id
                        GROUP BY s.seller_id;";

    $sellerData = [];
    if ($result = mysqli_query($dbConnection, $sellerQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $sellerData = $row;
        }
    }
    return $sellerData;
}

function getAllProductionPoints(){
    ob_start();
    global $dbConnection;

    $productionPointQuery = "SELECT f.farm_id, 
                                    f.producer_id, 
                                    f.farm_name, 
                                    f.farm_desc, 
                                    f.farm_address, 
                                    f.street, 
                                    f.house_number, 
                                    f.city, 
                                    f.zip, 
                                    ST_X(f.farm_location) as latitude, 
                                    ST_Y(f.farm_location) as longitude, 
                                    f.farm_area, 
                                    i.image_path, 
                                    GROUP_CONCAT(DISTINCT ps.seller_id) AS seller FROM farm_land f
                            LEFT JOIN images i on i.entity_id = f.farm_id and i.image_type = 3
                            LEFT JOIN products p on f.farm_id = p.production_location
                            LEFT JOIN product_sellers ps on ps.product_id = p.product_id
                            GROUP BY f.farm_id;";

    $productionPointData = [];
    if ($result = mysqli_query($dbConnection, $productionPointQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productionPointData = $row;
        }
    }
    return $productionPointData;
}


function getUserData($userId){
    ob_start();
    global $dbConnection;

    $userQuery = "SELECT * FROM user u
                LEFT JOIN images i on i.entity_id = u.user_id and i.image_type = 1
                WHERE u.user_id = $userId
                GROUP BY u.user_id;";

    $userData = [];
    if ($result = mysqli_query($dbConnection, $userQuery)) {
        while ($row = $result->fetch_assoc()) {
            $userData = $row;
        }
    }
    return $userData;
}

function fetchUserData(){
    global $dbConnection;
    $producerId = $_POST['producerId'] ? $_POST['producerId'] : 0;
    if ($producerId != 0){
        $userData = [];


        $userDetails = getUserData($producerId);
        $productionPoints = getAllProductionPointsByUser($producerId);
        $products = getAllProductsByUser($producerId);
        $sellingPoints = getAllSellersByUser($producerId);

        $userData['userDetails'] = $userDetails;
        $userData['productDetails'] = $products;
        $userData['productionPointDetails'] = $productionPoints;
        $userData['sellerDetails'] = $sellingPoints;

        mysqli_close($dbConnection);
        http_response_code(200);
        return json_encode($userData); 

    }
    http_response_code(400);
    return null;
}


function getAllProductionPointsByUser($userId){
    ob_start();
    global $dbConnection;

    $productionPointQuery = "SELECT f.farm_id, 
                                    f.producer_id, 
                                    f.farm_name, 
                                    f.farm_desc, 
                                    f.farm_address, 
                                    f.street, 
                                    f.house_number, 
                                    f.city, 
                                    f.zip, 
                                    ST_X(f.farm_location) as latitude, 
                                    ST_Y(f.farm_location) as longitude, 
                                    f.farm_area, 
                                    i.image_path FROM farm_land f
                            LEFT JOIN images i on i.entity_id = f.farm_id and i.image_type = 3
                            WHERE f.producer_id = $userId
                            GROUP BY f.farm_id;";

    $productionPointData = [];
    if ($result = mysqli_query($dbConnection, $productionPointQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productionPointData = $row;
        }
    }
    return $productionPointData;
}

function getAllProductsByUser($userId){
    ob_start();
    global $dbConnection;

    $productQuery = "SELECT i.image_path, 
                            p.*, 
                            GROUP_CONCAT(DISTINCT p_fea.feature_type) as features FROM products p
                    LEFT JOIN images i on i.image_type = 2 AND i.entity_id = p.product_id
                    LEFT JOIN product_feature p_fea on p_fea.product_id = p.product_id
                    WHERE p.producer_id = $userId
                    GROUP BY p.product_id;";

    $productData = [];
    if ($result = mysqli_query($dbConnection, $productQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productData = $row;
        }
    }
    return $productData;
}

function getAllSellersByUser($userId){
    ob_start();
    global $dbConnection;

    $sellerQuery = "SELECT s.seller_id, 
                            s.producer_id, 
                            s.seller_name, 
                            s.seller_description, 
                            s.street, 
                            s.building_number, 
                            s.city, s.zip, 
                            ST_X(s.seller_location) as latitude, 
                            ST_Y(s.seller_location) as longitude, 
                            s.seller_email, 
                            s.seller_website, 
                            s.mobile, 
                            s.phone, 
                            s.is_blocked, 
                            s.is_mon_available, s.mon_open_time, s.mon_close_time, 
                            s.is_tue_available, s.tue_open_time, s.tue_close_time, 
                            s.is_wed_available, s.wed_open_time, s.wed_close_time, 
                            s.is_thu_available, s.thu_open_time, s.thu_close_time, 
                            s.is_fri_available, s.fri_open_time, s.fri_close_time, 
                            s.is_sat_available, s.sat_open_time, s.sat_close_time, 
                            s.is_sun_available, s.sun_open_time, s.sun_close_time, 

                            img.image_id, 
                            img.image_type, 
                            img.image_name, 
                            img.image_path, 
                            img.entity_id FROM sellers s 
                    LEFT JOIN images img on img.entity_id = s.seller_id and img.image_type = 4
                    WHERE s.producer_id = $userId
                    GROUP BY s.seller_id;";
    $sellerData = [];
    if ($result = mysqli_query($dbConnection, $sellerQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $sellerData = $row;
        }
    }
    return $sellerData;
}
?>