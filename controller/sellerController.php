<?php
/****************************************************************
   FILE             :   sellerController.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   06.03.2021

   PURPOSE          :   To manage sellers and details of sellign points.
                        CRUD operations on sellers table
****************************************************************/


session_start();
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php";
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/sellerModel.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $header = apache_request_headers();
        $action = $header['action'];
        $sellingPoint = new seller($_POST);
        switch ($action){
            case 'CREATE':
                if (isAccessTokenValid()){
                    echo addProductionPoint($productionPoint);
                }else{
                    http_response_code(401);
                }
                break;
            case 'READ':
                if (isAccessTokenValid()){
                    echo getProductionPointDetails($productionPoint);
                }else{
                    http_response_code(401);
                }
                break;
            case 'READ_ALL':
                if (isAccessTokenValid()){
                    echo getAllProductionPoints($productionPoint);
                }else{
                    http_response_code(401);
                }
                break;
            case 'UPDATE':
                if (isAccessTokenValid()){
                    echo editProductionPoint($productionPoint);
                }else{
                    http_response_code(401);
                }
                break;
            case 'DELETE':
                if (isAccessTokenValid()){
                    echo deleteProduct($productionPoint);
                }else{
                    http_response_code(401);
                }
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
    FUNCTION    :   Function to add new selling point details into the table.
                    Also images of the selling point.
    INPUT       :   details of the selling point which is passed from the web service
    OUTPUT      :   success/failure message on completion
*/
function addSeller($sellerDetails){
    global $dbConnection;
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);
    $sellerInsertQuery = "INSERT INTO sellers (producer_id, seller_name, seller_description, street, building_number, city, zip, seller_location, seller_email, seller_website, mobile, phone, is_blocked, is_mon_available, mon_open_time, mon_close_time, is_tue_available, tue_open_time, tue_close_time, is_wed_available, wed_open_time, wed_close_time, is_thu_available, thu_open_time, thu_close_time, is_fri_available, fri_open_time, fri_close_time, is_sat_available, sat_open_time, sat_close_time, is_sun_available, sun_open_time, sun_close_time)"
        . "VALUES ($sellerDetails->producerId, '$sellerDetails->sellerName', '$sellerDetails->sellerDescription', '$sellerDetails->street', '$sellerDetails->buildingNumber', '$sellerDetails->city', '$sellerDetails->zip', POINT($sellerDetails->latitude, $sellerDetails->longitude), '$sellerDetails->email', '$sellerDetails->website', '$sellerDetails->mobile', '$sellerDetails->phone', $sellerDetails->isBlocked, $sellerDetails->isMonAvailable, '$sellerDetails->monOpenTime', '$sellerDetails->monCloseTime', $sellerDetails->isTueAvailable, '$sellerDetails->tueOpenTime', '$sellerDetails->tueCloseTime', $sellerDetails->isWedAvailable, '$sellerDetails->wedOpenTime', '$sellerDetails->wedCloseTime', $sellerDetails->isThuAvailable, '$sellerDetails->thuOpenTime', '$sellerDetails->thuCloseTime', $sellerDetails->isFriAvailable, '$sellerDetails->friOpenTime', '$sellerDetails->friCloseTime', $sellerDetails->isSatAvailable, '$sellerDetails->satOpenTime', '$sellerDetails->satCloseTime', $sellerDetails->isSunAvailable, '$sellerDetails->sunOpenTime', '$sellerDetails->sunCloseTime')";

    try{
        echo "trying to insert";
        echo "\n ".$sellerInsertQuery."\n";
        if (mysqli_query($dbConnection, $sellerInsertQuery))
            echo "   inserted succesfully   ";
        //            confirmQuery($productInsertQuery);
        $sellerId = $dbConnection->insert_id;
        $fileCount = count($fileNameArray);
        $productionPointImageQuery = "INSERT INTO images (image_type, image_name, entity_id) VALUES ";

        mysqli_commit($dbConnection);

        echo "inserted";
        echo "production Point id is $sellerId, ";
        http_response_code(200);
        return true;

    }catch(mysqli_sql_exception $exception){
        echo "faild to add a new production point,";
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
        http_response_code(400);
        return false;
    }
}

/*
    FUNCTION    :   Function to edit details of a seller.
                    Also images of the selling point.
    INPUT       :   details of the selling point which is passed from the web service
    OUTPUT      :   success/failure message on completion
*/
function editProductionPoint($sellerDetails){
    global $dbConnection;
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);


    $sellerUpdateQuery = "UPDATE farm_land SET producer_id = $sellerDetails->producerId, seller_name = '$sellerDetails->sellerName', seller_description = '$sellerDetails->sellerDescription', street = '$sellerDetails->street', building_number = '$sellerDetails->buildingNumber', city = '$sellerDetails->city', zip = '$sellerDetails->zip', seller_location = POINT($sellerDetails->latitude, $sellerDetails->longitude), seller_email = '$sellerDetails->email', seller_website = '$sellerDetails->website', mobile = '$sellerDetails->mobile', phone = '$sellerDetails->phone', is_blocked = '$sellerDetails->isBlocked', is_mon_available = '$sellerDetails->isMonAvailable', mon_open_time = '$sellerDetails->monOpenTime', mon_close_time = '$sellerDetails->monCloseTime', is_tue_available = '$sellerDetails->isTueAvailable', tue_open_time = '$sellerDetails->tueOpenTime', tue_close_time = '$sellerDetails->tueCloseTime', is_wed_available = '$sellerDetails->isWedAvailable', wed_open_time = '$sellerDetails->wedOpenTime', wed_close_time = '$sellerDetails->wedCloseTime', is_thu_available = '$sellerDetails->isThuAvailable', thu_open_time = '$sellerDetails->thuOpenTime', thu_close_time = '$sellerDetails->thuCloseTime', is_fri_available = '$sellerDetails->isFriAvailable', fri_open_time = '$sellerDetails->friOpenTime', fri_close_time = '$sellerDetails->friCloseTime', is_sat_available = '$sellerDetails->isSatAvailable', sat_open_time = '$sellerDetails->satOpenTime', sat_close_time = '$sellerDetails->satCloseTime', is_sun_available = '$sellerDetails->isSunAvailable', sun_open_time = '$sellerDetails->sunOpenTime', sun_close_time = '$sellerDetails->sunCloseTime'";


    try{
        echo "trying to insert";
        echo "\n ".$sellerUpdateQuery."\n";
        if (mysqli_query($dbConnection, $sellerUpdateQuery))
            echo "   updated succesfully   ";
        //            confirmQuery($productInsertQuery);
        //        $productionPointId = $dbConnection->insert_id;
        //        $fileCount = count($fileNameArray);
        //        $productionPointImageQuery = "INSERT INTO images (image_type, image_name, entity_id) VALUES ";
        //        if ($fileCount > 0){
        //            for ($i = 0; $i<$fileCount; $i++){
        //                $imageName = $fileNameArray[$i];
        //                $productionPointImageQuery .= "(2, '$imageName', $productionPointId)";
        //                if ($i===$fileCount-1){
        //                    $productionPointImageQuery .= ";";
        //                }else{
        //                    $productionPointImageQuery .= ", ";
        //                }
        //            }
        //            echo $productionPointImageQuery;
        //            if (mysqli_query($dbConnection, $productionPointImageQuery)){
        //                echo "  Files inserted succesfully   ";
        //                mysqli_commit($dbConnection);
        //            }else{
        //                echo "product creation failed at inserting images,";
        //                mysqli_rollback($dbConnection);
        //            }
        //        }else{
        mysqli_commit($dbConnection);

        echo "updated";
        //        echo "production Point id is $productionPointId, ";
        //        }
        http_response_code(200);
        return true;
    }catch(mysqli_sql_exception $exception){
        echo "faild to update seller,";
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
        http_response_code(400);
        return false;
    }
    http_response_code(400);
    return false;
}

/*
    FUNCTION    :   function deletes an entry of seller by a user from the database
    INPUT       :   id of the seller to be deleted
    OUTPUT      :   return true if product deleted successully otherwise false
*/
function deleteProduct($seller){
    ob_start();
    global $dbConnection;
    $deleteSellerQuery = "DELETE FROM sellers ";
    $deleteSellerQuery .= "WHERE seller_id = $seller->sellerId AND producer_id = $seller->producerId;";
    $deleteProductResult = mysqli_query($dbConnection, $deleteSellerQuery);
    confirmQuery($deleteSellerResult);
    if ($deleteSellerResult == true){
        ob_end_clean();
        http_response_code(200);
        return true;
    }else{
        http_response_code(400);
        return "<script>console.log('PHP: No sellers found with the given seller id');</script>";
    }
    http_response_code(400);
    return false;
}

/*
    FUNCTION    :   Function to read all sellers by a user.
    INPUT       :   id of the user is passed from the web service
    OUTPUT      :   returns json comprising details of seller 
*/
function getAllProductionPoints($seller){

    $sellerDataArray = [];

    global $dbConnection;
    /* Start transaction */

    $fetchAllSellerQuery = "SELECT s.seller_id, s.producer_id, s.seller_name, s.seller_description, s.street, s.building_number, s.city, s.zip, s.seller_location, s.seller_email, s.seller_website, s.mobile, s.phone, s.is_blocked, s.is_mon_available, s.mon_open_time, s.mon_close_time, s.is_tue_available, s.tue_open_time, s.tue_close_time, s.is_wed_available, s.wed_open_time, s.wed_close_time, s.is_thu_available, s.thu_open_time, s.thu_close_time, s.is_fri_available, s.fri_open_time, s.fri_close_time, s.is_sat_available, s.sat_open_time, s.sat_close_time, s.is_sun_available, s.sun_open_time, s.sun_close_time FROM sellers s
    LEFT JOIN images i on (i.entity_id = s.seller_id and i.image_type = 4)
    WHERE s.producer_id = $seller->producerId
    GROUP BY s.seller_id ORDER BY s.created_date DESC";

    $getAllSellerQuery = mysqli_query($dbConnection, $fetchAllSellerQuery);
    confirmQuery($getAllSellerQuery);
    $sellerCount = mysqli_num_rows($getAllSellerQuery);
    if ($sellerCount == 0){
        $SellerArray = [];
        http_response_code(200);
        return $productionPoitArray;
    }else{
        while($row = mysqli_fetch_assoc($getAllSellerQuery)) {


            $sellerData = new seller($row);
            array_push($sellerDataArray, $sellerData);

            //            $pointName = $row['farm_name'];
            //            $pointDesc = $row['farm_desc'];
            //            $pointAddress = $row['farm_address'];
            //            $imageName = $row['image_name'];
            //            $imagePath = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk_uploads/production_point_img/";
            //            if ($imageName === null){
            //                $imagePath = "/kleinerzeugernetzwerk/images/defaul_agricultural-land.jpg";
            //            }else{
            //                $imagePath .= $imageName;
            //            }
        }
    }
    http_response_code(200);
    return json_encode($sellerDataArray);
}

/*
    FUNCTION    :   Function to read individual seller details by a user.
    INPUT       :   id of the seller and producer id is passed in the web service
    OUTPUT      :   array containign details of the seller will be returned
*/
function getProductionPointDetails($seller){

    $productionPoitArray = [];

    global $dbConnection;
    /* Start transaction */
    
    $fetchSellerDetailsQuery = "SELECT s.seller_id, s.producer_id, s.seller_name, s.seller_description, s.street, s.building_number, s.city, s.zip, s.seller_location, s.seller_email, s.seller_website, s.mobile, s.phone, s.is_blocked, s.is_mon_available, s.mon_open_time, s.mon_close_time, s.is_tue_available, s.tue_open_time, s.tue_close_time, s.is_wed_available, s.wed_open_time, s.wed_close_time, s.is_thu_available, s.thu_open_time, s.thu_close_time, s.is_fri_available, s.fri_open_time, s.fri_close_time, s.is_sat_available, s.sat_open_time, s.sat_close_time, s.is_sun_available, s.sun_open_time, s.sun_close_time FROM sellers s
    WHERE s.producer_id = $seller->producerId AND s.seller_id = $seller->seller_id";
    
    

//    $fetchProductionPointQuery = "SELECT f.farm_id, f.producer_id, f.farm_name, f.farm_desc, f.farm_address, f.street, f.house_number, f.city, f.zip, ST_X(f.farm_location) as latitude, ST_Y(f.farm_location) as longitude, f.farm_area FROM farm_land f
//    LEFT JOIN images i on (i.entity_id = f.farm_id and i.image_type = 2)
//    WHERE f.producer_id = '$productionPoint->producerId' AND f.farm_id = $productionPoint->farmId";

    $getSellerQuery = mysqli_query($dbConnection, $fetchSellerDetailsQuery);
    confirmQuery($getSellerQuery);
    $productCount = mysqli_num_rows($getSellerQuery);
    if ($productCount == 0){
        //        $productionPoitArray = [];
        http_response_code(400);
        return false;
    }else{
        while($row = mysqli_fetch_assoc($getSellerQuery)) {

            $sellerData = new seller($row);
            http_response_code(200);
            return json_encode($sellerData);
        }
    }
    http_response_code(400);
    return false;
}
?>