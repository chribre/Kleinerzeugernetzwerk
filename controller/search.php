<?php
/****************************************************************
   FILE             :   search.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   12.05.2021

   PURPOSE          :   To get search results from plain text
****************************************************************/


session_start();
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $header = apache_request_headers();
        $action = $header['action'];
        switch ($action){
            case 'SEARCH':
                echo getSearchResults();
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


/*
    FUNCTION    :   Function to read individual seller details by a user.
    INPUT       :   id of the seller and producer id is passed in the web service
    OUTPUT      :   array containign details of the seller will be returned
*/
function getSearchResults(){
    global $dbConnection;
    $searchText = $_POST['searchText'] ? $_POST['searchText'] : '';
    $filter = $_POST['filter'] ? $_POST['filter'] : [];
    $filter_product = $filter['product'] == true ? $filter['product'] : false;
    $filter_producttion_point = $filter['productionPoint'] == true ? $filter['productionPoint'] : false;
    $filter_seller = $filter['seller'] == true ? $filter['seler'] : false;
    $filter_user = $filter['user'] == true ? $filter['user'] : false;
    
    $searchData = [];
    if ($searchText != ''){
        $productData = $filter_product == 'true' ? searchProducts($searchText) : [];
        $productionPointData = $filter_producttion_point == 'true' ? searchProductionPoint($searchText) : [];
        $sellerData = $filter_seller == 'true' ? searchSeller($searchText) : [];
        $producerData = $filter_user == 'true' ? searchproducer($searchText) : [];
        
        
        $searchData['productDetails'] = $productData;
        $searchData['productionPointDetails'] = $productionPointData;
        $searchData['sellerDetails'] = $sellerData;
        $searchData['userDetails'] = $producerData;
        
        mysqli_close($dbConnection);
        http_response_code(200);
        return json_encode($searchData);
    }
    http_response_code(400);
    return null;
}



function searchProducts($searchText){
    ob_start();
    global $dbConnection;

    $productSearchQuery = "SELECT p.product_id, p.producer_id, p.product_name, p.product_description, product_category, p.price_per_unit, p.quantity_of_price, p.unit, uni.unit_abbr,
i.image_id, i.image_path as product_image,
pc.category_name,
f.street, f.house_number, f.city, f.zip,
u.first_name, u.last_name, img.image_path as user_image,
GROUP_CONCAT(DISTINCT pf.feature_type) as features
FROM products p
LEFT JOIN product_category pc on pc.category_id = p.product_category
LEFT JOIN images i ON i.entity_id = p.product_id and i.image_type = 2
LEFT JOIN farm_land f ON f.farm_id = p.production_location
LEFT JOIN user u on u.user_id = p.producer_id
LEFT JOIN images img ON img.entity_id = u.user_id and img.image_type = 1
LEFT JOIN units uni on uni.unit_id = p.unit
LEFT JOIN product_feature pf on pf.product_id = p.product_id
LEFT JOIN feature_type ft on ft.feature_type_id = pf.feature_type
WHERE MATCH(p.product_name, p.product_description)
AGAINST('$searchText' IN BOOLEAN MODE)

OR MATCH(pc.category_name)
AGAINST('$searchText' IN BOOLEAN MODE)

OR MATCH(ft.feature_name)
AGAINST('$searchText' IN BOOLEAN MODE)

GROUP BY p.product_id;";

    $productData = [];
    if ($result = mysqli_query($dbConnection, $productSearchQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productData = $row;
        }
    }
    return $productData;
}


function searchProductionPoint($searchText){
    ob_start();
    global $dbConnection;

    $productionPointSearchQuery = "SELECT f.farm_id, 
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
                       WHERE MATCH(f.farm_name, f.farm_desc, f.street, f.house_number, f.city, f.zip)
                       AGAINST('$searchText' IN BOOLEAN MODE)

                        GROUP BY f.farm_id;";

    $productionPointData = [];
    if ($result = mysqli_query($dbConnection, $productionPointSearchQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $productionPointData = $row;
        }
    }
    return $productionPointData;
}



function searchSeller($searchText){
    ob_start();
    global $dbConnection;

    $sellerSearchQuery = "SELECT s.seller_id, 
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
                    WHERE MATCH(s.seller_name, s.seller_description, s.street, s.building_number, s.city, s.zip, s.seller_email, s.seller_website)
					AGAINST('$searchText' IN BOOLEAN MODE)
                    GROUP BY s.seller_id;";

    $sellerData = [];
    if ($result = mysqli_query($dbConnection, $sellerSearchQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $sellerData = $row;
        }
    }
    return $sellerData;
}



function searchproducer($searchText){
    ob_start();
    global $dbConnection;

    $producerSearchQuery = "SELECT * FROM user u
                LEFT JOIN images i on i.entity_id = u.user_id and i.image_type = 1
               WHERE MATCH(u.first_name, u.last_name, u.description, u.street, u.house_number, u.city, u.zip)
					AGAINST('$searchText' IN BOOLEAN MODE)
                GROUP BY u.user_id;";

    $producerData = [];
    if ($result = mysqli_query($dbConnection, $producerSearchQuery)) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
            $producerData = $row;
        }
    }
    return $producerData;
}
?>