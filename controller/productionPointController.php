<?php 
/****************************************************************
   FILE             :   productionPointController.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   22.02.2021

   PURPOSE          :   To manage production points of a user.
                        CRUD operations on farmland table
****************************************************************/
session_start();
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php";
include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/productionPointModel.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $header = apache_request_headers();
        $action = $header['action'];
        $productionPoint = new productionPoint($_POST);
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
    FUNCTION    :   Function to add new production point details into the table.
                    Also images of the production point.
    INPUT       :   details of the production point which is passed from the web service
    OUTPUT      :   success/failure message on completion
*/
function addProductionPoint($productionPoint){
    global $dbConnection;
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);
    $productionPointInsertQuery = "INSERT INTO farm_land (producer_id, farm_name, farm_desc, farm_address, street, house_number, city, zip, farm_location, farm_area	)"
        . "VALUES ($productionPoint->producerId, '$productionPoint->farmName', '$productionPoint->farmDesc', '$productionPoint->farmAddress', '$productionPoint->street', '$productionPoint->houseNumber', '$productionPoint->city', '$productionPoint->zip', POINT($productionPoint->latitude, $productionPoint->longitude), $productionPoint->farmArea)";

    try{
        echo "trying to insert";
        echo "\n ".$productionPointInsertQuery."\n";
        if (mysqli_query($dbConnection, $productionPointInsertQuery))
            echo "   inserted succesfully   ";
        //            confirmQuery($productInsertQuery);
        $productionPointId = $dbConnection->insert_id;
        $fileCount = count($fileNameArray);
        $productionPointImageQuery = "INSERT INTO images (image_type, image_name, entity_id) VALUES ";
        if ($fileCount > 0){
            for ($i = 0; $i<$fileCount; $i++){
                $imageName = $fileNameArray[$i];
                $productionPointImageQuery .= "(2, '$imageName', $productionPointId)";
                if ($i===$fileCount-1){
                    $productionPointImageQuery .= ";";
                }else{
                    $productionPointImageQuery .= ", ";
                }
            }
            echo $productionPointImageQuery;
            if (mysqli_query($dbConnection, $productionPointImageQuery)){
                echo "  Files inserted succesfully   ";
                mysqli_commit($dbConnection);
                http_response_code(200);
                return true;
            }else{
                echo "product creation failed at inserting images,";
                mysqli_rollback($dbConnection);
                http_response_code(400);
                return false;
            }
        }else{
            mysqli_commit($dbConnection);

            echo "inserted";
            echo "production Point id is $productionPointId, ";
            http_response_code(200);
            return true;
        }
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
    FUNCTION    :   Function to edit details of a production point.
                    Also images of the production point.
    INPUT       :   details of the production point which is passed from the web service
    OUTPUT      :   success/failure message on completion
*/
function editProductionPoint($productionPoint){
    global $dbConnection;
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);
    //    $productionPointInsertQuery = "INSERT INTO farm_land (producer_id, farm_name, farm_desc, farm_address, farm_location, farm_area	)"
    //        . "VALUES ($productionPoint->producerId, '$productionPoint->farmName', '$productionPoint->farmDesc', '$productionPoint->farmAddress', POINT($productionPoint->latitude, $productionPoint->longitude), $productionPoint->farmArea)";


    $productionPointUpdateQuery = "UPDATE farm_land SET producer_id = $productionPoint->producerId, farm_name = '$productionPoint->farmName', farm_desc = '$productionPoint->farmDesc', farm_address = '$productionPoint->farmAddress', street = '$productionPoint->street' , house_number = '$productionPoint->houseNumber', city = '$productionPoint->city', zip = '$productionPoint->zip',  farm_location = POINT($productionPoint->latitude, $productionPoint->longitude), farm_area = $productionPoint->farmArea WHERE farm_id = $productionPoint->farmId";


    try{
        echo "trying to insert";
        echo "\n ".$productionPointUpdateQuery."\n";
        if (mysqli_query($dbConnection, $productionPointUpdateQuery))
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
        echo "faild to add a new production point,";
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
    FUNCTION    :   Function to read all production points by a user.
    INPUT       :   id of the user is passed from the web service
    OUTPUT      :   success/failure message on completion
*/
function getAllProductionPoints($productionPoint){

    $productionPoitArray = [];

    global $dbConnection;
    /* Start transaction */

    $fetchProductionPointQuery = "SELECT f.farm_id, f.producer_id, f.farm_name, f.farm_desc, f.farm_address, f.street, f.house_number, f.city, f.zip, f.farm_area FROM farm_land f 
    LEFT JOIN images i on (i.entity_id = f.farm_id and i.image_type = 2)
    WHERE f.producer_id = '$productionPoint->producerId'
    GROUP BY f.farm_id ORDER BY f.created_date DESC";

    $getProductionPointQuery = mysqli_query($dbConnection, $fetchProductionPointQuery);
    confirmQuery($getProductionPointQuery);
    $productCount = mysqli_num_rows($getProductionPointQuery);
    if ($productCount == 0){
        $productionPoitArray = [];
        http_response_code(200);
        return $productionPoitArray;
    }else{
        while($row = mysqli_fetch_assoc($getProductionPointQuery)) {


            $farmData = new productionPoint($row);
            array_push($productionPoitArray, $farmData);

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
    return json_encode($productionPoitArray);
}
/*
    FUNCTION    :   Function to read individual production points by a user.
    INPUT       :   id of the production point and producer id is passed in the web service
    OUTPUT      :   array containign details of the production point will be returned
*/
function getProductionPointDetails($productionPoint){

    $productionPoitArray = [];

    global $dbConnection;
    /* Start transaction */

    $fetchProductionPointQuery = "SELECT f.farm_id, f.producer_id, f.farm_name, f.farm_desc, f.farm_address, f.street, f.house_number, f.city, f.zip, ST_X(f.farm_location) as latitude, ST_Y(f.farm_location) as longitude, f.farm_area FROM farm_land f
    LEFT JOIN images i on (i.entity_id = f.farm_id and i.image_type = 2)
    WHERE f.producer_id = '$productionPoint->producerId' AND f.farm_id = $productionPoint->farmId";

    $getProductionPointQuery = mysqli_query($dbConnection, $fetchProductionPointQuery);
    confirmQuery($getProductionPointQuery);
    $productCount = mysqli_num_rows($getProductionPointQuery);
    if ($productCount == 0){
        //        $productionPoitArray = [];
        http_response_code(400);
        return false;
    }else{
        while($row = mysqli_fetch_assoc($getProductionPointQuery)) {

            $farmData = new productionPoint($row);
            http_response_code(200);
            return json_encode($farmData);
        }
    }
    http_response_code(400);
    return false;
}

/*
    FUNCTION    :   function deletes an entry of production point by a user from the database
    INPUT       :   id of the product to be deleted
    OUTPUT      :   return true if product deleted successully otherwise false
*/
function deleteProduct($productionPoint){
    ob_start();
    global $dbConnection;
    $deleteProductQuery = "DELETE FROM farm_land ";
    $deleteProductQuery .= "WHERE farm_id = $productionPoint->farmId AND producer_id = $productionPoint->producerId;";
    $deleteProductResult = mysqli_query($dbConnection, $deleteProductQuery);
    confirmQuery($deleteProductResult);
    if ($deleteProductResult == true){
        ob_end_clean();
        http_response_code(200);
        return true;
    }else{
        http_response_code(400);
        return "<script>console.log('PHP: No products found with the given product id');</script>";
    }
    http_response_code(400);
    return false;
}
?>